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
     * @param Box $model
     */
    public function __construct(Box $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @return Box
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data): Box
    {
        // Make sure it doesn't already exist
        if ($this->boxExists($data['name'])) {
            throw new GeneralException('A box already exists with the name ' . e($data['name']));
        }

        return DB::transaction(function () use ($data) {
            $box = $this->model::create([
                'name' => $data['name'],
                'short_description' => $data['short_description'],
                'long_description' => $data['long_description'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zip' => $data['zip'],
                'country' => $data['country'],
                'is_active' => $data['is_active']
            ]);

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
        if (strtolower($box->name) !== strtolower($data['name'])) {
            if ($this->boxExists($data['name'])) {
                throw new GeneralException('A box already exists with the name ' . $data['name']);
            }
        }

        return DB::transaction(function () use ($box, $data) {
            if ($box->update([
                'name' => $data['name'],
                'short_description' => $data['short_description'],
                'long_description' => $data['long_description'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zip' => $data['zip'],
                'country' => $data['country'],
                'is_active' => $data['is_active']
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
    protected function boxExists($name): bool
    {
        return $this->model
                ->where('name', $name)
                ->count() > 0;
    }
}
