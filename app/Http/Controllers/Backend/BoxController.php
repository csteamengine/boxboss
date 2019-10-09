<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Boxes\ManageBoxRequest;
use App\Http\Requests\Backend\Boxes\StoreBoxRequest;
use App\Http\Requests\Backend\Boxes\UpdateBoxRequest;
use App\Models\Box;
use App\Repositories\Backend\BoxRepository;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * @var BoxRepository
     */
    protected $boxRepository;

    /**
     * @param BoxRepository $boxRepository
     */
    public function __construct(BoxRepository $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }
    /**
     *
     * @return mixed
     */
    public function index()
    {
        return view('backend.boxes.index')
            ->withBoxes($this->boxRepository
                ->orderBy('id')
                ->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.boxes.create');
    }

    /**
     * @param  StoreBoxRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreBoxRequest $request)
    {
        $this->boxRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.created'));
    }

    /**
     * @param ManageBoxRequest $request
     * @param Box $box
     * @return mixed
     */
    public function edit(ManageBoxRequest $request, Box $box)
    {
        return view('backend.boxes.edit')
            ->withBox($box);
    }

    /**
     * @param  UpdateBoxRequest  $request
     * @param  Box  $box
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {
        $this->boxRepository->update($box, $request->only('name', 'permissions'));

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.updated'));
    }

    /**
     * @param ManageBoxRequest $request
     * @param Box              $box
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageBoxRequest $request, Box $box)
    {
        $this->boxRepository->deleteById($box->id);

        return redirect()->route('admin.boxes.index')->withFlashSuccess(__('alerts.backend.boxes.deleted'));
    }
}
