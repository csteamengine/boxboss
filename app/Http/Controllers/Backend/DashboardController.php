<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Facades\FeatureFlag;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function updateActiveBox(Request $request){

        $boxID = $request->input('active-box');
        $box = Box::find($boxID);

        if(auth()->user()->getAllBoxes()->contains('id', $box->id)){
            session(['active_box' => $box]);
            return redirect()->route("admin.dashboard")->withFlashSuccess("Updated Active Box");
        }
        return redirect()->route("admin.dashboard")->withFlashWarning("You don\'t have permission to do that.");
    }
}
