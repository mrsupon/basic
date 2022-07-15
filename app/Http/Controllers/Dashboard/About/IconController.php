<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IconController extends Controller
{
    public function create()
    {
        return view('dashboard.abouts.icons.create');
    }
}
