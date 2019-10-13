<?php

namespace App\Http\Composers;

use App\Models\Box;
use Illuminate\View\View;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        if (!session()->has('active_box') && auth()->user()) {
            session(['active_box' => auth()->user()->allBoxes()->first()]);
        }

        if(!session('active_box')){
            session('active_box', new Box());
        }

        $view->with('logged_in_user', auth()->user());
    }
}
