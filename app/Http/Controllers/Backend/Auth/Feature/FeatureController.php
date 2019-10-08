<?php

namespace App\Http\Controllers\Backend\Auth\Feature;

use App\Models\Feature;
use App\Repositories\Backend\Auth\FeatureRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Repositories\Backend\Auth\RoleRepository;
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

    public function toggle($id){
        $feature = Feature::find($id)->first();
        if(!is_null($feature)){
            if($feature->is_active){
                $feature->toggleOff($feature->name);
            }else{
                $feature->toggleOn($feature->name);
            }

            if($feature->save()){
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
