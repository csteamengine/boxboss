<?php

namespace App\Repositories\Backend;

use App\Models\Invite;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Box\BoxCreated;
use App\Events\Backend\Box\BoxUpdated;
use Str;

/**
 * Class InviteRepository.
 */
class InviteRepository extends BaseRepository
{
    /**
     * InviteRepository constructor.
     *
     * @param  Invite  $model
     */
    public function __construct(Invite $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Invite
     */
    public function create(array $data) : Invite
    {
        $key = config('app.key');
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

        // Make sure it doesn't already exist
        if ($this->inviteExists($data['email'], $data['role'])) {
            throw new GeneralException('An Invite already exists with the email and role.');
        }

        return DB::transaction(function () use ($data) {
            $invite = $this->model::create([
                'box_id' => $data['box_id'],
                'email' => $data['email'],
                'role' => $data['role'],
                'token' => hash_hmac('sha256', Str::random(40), $key),
            ]);

            if ($invite) {

//                event(new InviteCreated($invite));

                return $invite;
            }

            throw new GeneralException(trans('exceptions.backend.invites.create_error'));
        });
    }

    /**
     * @param $email
     * @param $role
     * @return bool
     */
    protected function inviteExists($email, $role) : bool
    {
        return $this->model
            ->where('email', $email)
            ->where('role', $role)
            ->count() > 0;
    }
}
