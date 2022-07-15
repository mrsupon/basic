<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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
        $message="";
        $imageFilename = "";
        if($imageFile){
            $imageFilename = hexdec(uniqid()).".".$imageFile->getClientOriginalExtension();
            Image::make($imageFile)->resize(636,852)->save('backend/banners/uploadedImages/'.$imageFilename);
            $message="Banner Updated Successfully";
        }
        else{
            $message="Banner Updated Without Image Successfully";
        }

        Banner::findOrFail($id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'video_url'=>$request->video_url,
            'image'=>$imageFilename,
        ]);

        $notification = array(
            "message"=>$message,
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);

    }
}
