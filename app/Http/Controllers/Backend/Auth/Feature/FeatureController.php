<?php

namespace App\Http\Controllers\Backend\Auth\Feature;

use App\Http\Requests\Backend\Auth\Feature\ManageFeatureRequest;
use App\Http\Requests\Backend\Auth\Feature\StoreFeatureRequest;
use App\Http\Requests\Backend\Auth\Feature\UpdateFeatureRequest;
use App\Models\Feature;
use App\Repositories\Backend\Auth\FeatureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    /**
     * @var FeatureRepository
     */
    protected $featureRepository;

    /**
     * @param FeatureRepository $featureRepository
     */
    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    /**
     *
     * @return mixed
     */
    public function index()
    {
        return view('backend.auth.features.index')
            ->withFeatures($this->featureRepository
                ->orderBy('id')
                ->paginate());
    }

    public function toggle($id)
    {
        $feature = Feature::where('id', $id)->first();

        if (!is_null($feature)) {
            if ($feature->is_active) {
                $feature->toggleOff($feature->name);
            } else {
                $feature->toggleOn($feature->name);
            }

            if ($feature->save()) {
                return response()->json([
                    'message' => "Successfully updated the feature status"
                ], 200);
            }
        }
        return response()->json([
            'message' => 'Failed to update the feature'
        ], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.features.create');
    }

    /**
     * @param StoreFeatureRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreFeatureRequest $request)
    {
        $this->featureRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.auth.features.index')->withFlashSuccess(__('alerts.backend.features.created'));
    }

    /**
     * @param ManageFeatureRequest $request
     * @param Feature $feature
     * @return mixed
     */
    public function edit(ManageFeatureRequest $request, Feature $feature)
    {
        return view('backend.auth.features.edit')
            ->withFeature($feature);
    }

    /**
     * @param UpdateFeatureRequest $request
     * @param Feature $feature
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $this->featureRepository->update($feature, $request->only('name', 'permissions'));

        return redirect()->route('admin.auth.features.index')->withFlashSuccess(__('alerts.backend.features.updated'));
    }

    /**
     * @param ManageFeatureRequest $request
     * @param Feature $feature
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageFeatureRequest $request, Feature $feature)
    {
        $this->featureRepository->deleteById($feature->id);

        return redirect()->route('admin.auth.features.index')->withFlashSuccess(__('alerts.backend.features.deleted'));
    }
}
