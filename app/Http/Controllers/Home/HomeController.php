<?php

namespace App\Http\Controllers\Home;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $bannerId= 1;
        $banners = Banner::find($bannerId);
        return view('home.index', compact('banners'));
    }
}
