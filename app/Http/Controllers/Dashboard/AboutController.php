<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit($id)
    {
        return view('dashboard.abouts.edit');
    }
}
