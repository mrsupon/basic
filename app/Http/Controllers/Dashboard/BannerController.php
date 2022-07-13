<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('dashboard.banners.edit', compact('banners'));
    }

    public function update(Request $request, $id)
    {
        echo $request->title."</br>" ;
        echo $request->content."</br>" ;
        echo $request->video_url."</br>" ;
        echo $request->image."</br>" ;
    }
}
