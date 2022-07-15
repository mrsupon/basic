<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $bannerId= 1;
        $banners = Banner::find($bannerId);

        $aboutId= 1;
        $abouts = About::find($aboutId);

        return view('home.index', compact('banners','abouts'))->with('active','index');
    }
    public function show_about_page()
    {
        $aboutId= 1;
        $abouts = About::find($aboutId);

        return view('home.about_page', compact('abouts'))->with('active','about_page');
    }
}
