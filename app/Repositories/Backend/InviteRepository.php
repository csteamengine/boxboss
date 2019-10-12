<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Invite\InviteCreated;
use App\Models\Invite;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Str;

/**
 * Class InviteRepository.
 */
class InviteRepository extends BaseRepository
{
    /**
     * InviteRepository constructor.
     *
     * @param Invite $model
     */
    public function __construct(Invite $model)
    {
        $this->model = $model;
    }


    /**
     * Get all instances of model
     * @return Invite[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $token
     *
     * @param $email
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function findInvitesByEmail($email)
    {
        $invites = Invite::where('email', $email)->whereDate('expires', '>=', Carbon::today()->toDateString());

        return $invites->get();
    }

    /**
     * @param array $data
     *
     * @return Invite
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data): Invite
    {
        $existing = $this->model
            ->where('email', $data['email'])
            ->where('role', $data['role'])
            ->where('box_id', $data['box_id'])
            ->first();

        // Make sure it doesn't already exist
        if ($existing) {
            $existing->delete();
        }

        return DB::transaction(function () use ($data) {
            $key = config('app.key');
            if (Str::startsWith($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            $invite = $this->model::create([
                'box_id' => $data['box_id'],
                'email' => $data['email'],
                'role' => $data['role'],
                'token' => hash_hmac('sha256', Str::random(40), $key),
            ]);

            if ($invite) {

                event(new InviteCreated($invite));

                return $invite;
            }

            throw new GeneralException(trans('exceptions.backend.invites.create_error'));
        });
    }


}
