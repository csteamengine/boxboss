<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Feature;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Feature\FeatureCreated;
use App\Events\Backend\Auth\Feature\FeatureUpdated;

/**
 * Class FeatureRepository.
 */
class FeatureRepository extends BaseRepository
{
    /**
     * FeatureRepository constructor.
     *
     * @param Feature $model
     */
    public function __construct(Feature $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @return Feature
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data): Feature
    {
        // Make sure it doesn't already exist
        if ($this->featureExists($data['name'])) {
            throw new GeneralException('A feature already exists with the name ' . e($data['name']));
        }

        return DB::transaction(function () use ($data) {
            $feature = $this->model::create(['name' => strtolower(str_replace(' ', '_', $data['name'])), 'is_active' => true]);

            if ($feature) {

                event(new FeatureCreated($feature));

                return $feature;
            }

            throw new GeneralException(trans('exceptions.backend.access.features.create_error'));
        });
    }

    /**
     * @param Feature $feature
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Feature $feature, array $data)
    {
        // If the name is changing make sure it doesn't already exist
        if ($feature->name !== strtolower(str_replace(' ', '_', $data['name']))) {
            if ($this->featureExists(str_replace(' ', '_', $data['name']))) {
                throw new GeneralException('A feature already exists with the name ' . $data['name']);
            }
        }

        return DB::transaction(function () use ($feature, $data) {
            if ($feature->update([
                'name' => strtolower($data['name']),
            ])) {

                event(new FeatureUpdated($feature));

                return $feature;
            }

            throw new GeneralException(trans('exceptions.backend.access.features.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function featureExists($name): bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
