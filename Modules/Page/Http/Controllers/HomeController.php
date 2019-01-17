<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.home.index');
    }

    private function determineFullWidthSlider()
    {
        $theme = setting('storefront_layout');

        return $theme === 'full_width_slider_collapsed_menu' || $theme == 'full_width_slider_expanded_menu';
    }
}
