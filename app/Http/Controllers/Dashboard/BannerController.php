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
        $imageFile = $request->file('banner_image_filename');
        $imageFilename = "";
        if($imageFile){
            $imageFilename = date('YmdHis').$imageFile->getClientOriginalName();
            $imageFile->move(public_path('backend/banners/uploadedImages'),$imageFilename);
        }

        Banner::findOrFail($id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'video_url'=>$request->video_url,
            'image'=>$imageFilename,
        ]);

        $notification = array(
            "message"=>"Banner Updated Successfully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);

    }
}
