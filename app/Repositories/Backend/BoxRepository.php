<?php

namespace App\Repositories\Backend;

use App\Models\Box;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Box\BoxCreated;
use App\Events\Backend\Box\BoxUpdated;

/**
 * Class BoxRepository.
 */
class BoxRepository extends BaseRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param  Box  $model
     */
    public function __construct(Box $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Box
     */
    public function create(array $data) : Box
    {
        // Make sure it doesn't already exist
        if ($this->boxExists($data['name'])) {
            throw new GeneralException('A box already exists with the name '.e($data['name']));
        }

        return DB::transaction(function () use ($data) {
            $box = $this->model::create(['name' => strtolower($data['name']), 'is_active' => true]);

            if ($box) {

                event(new BoxCreated($box));

                return $box;
            }

            throw new GeneralException(trans('exceptions.backend.access.boxes.create_error'));
        });
    }

    /**
     * @param Box $box
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Box $box, array $data)
    {
        // If the name is changing make sure it doesn't already exist
        if ($box->name !== strtolower($data['name'])) {
            if ($this->boxExists($data['name'])) {
                throw new GeneralException('A box already exists with the name '.$data['name']);
            }
        }

        return DB::transaction(function () use ($box, $data) {
            if ($box->update([
                'name' => strtolower($data['name']),
            ])) {

                event(new BoxUpdated($box));

                return $box;
            }

            throw new GeneralException(trans('exceptions.backend.access.boxes.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function boxExists($name) : bool
    {
        return $this->model
            ->where('name', strtolower($name))
            ->count() > 0;
    }
}
