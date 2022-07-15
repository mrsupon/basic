<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function edit($id)
    {
        $abouts = About::find($id);
        return view('dashboard.abouts.edit', compact('abouts'));
    }

    public function update(Request $request, $id)
    {
        $imageFile = $request->file('experience_icon_filename');
        $message="";
        $imageFilename = "";
        if($imageFile){
            $imageFilename = hexdec(uniqid()).".".$imageFile->getClientOriginalExtension();
            Image::make($imageFile)->resize(523,605)->save('backend/abouts/uploadedImages/'.$imageFilename);
            $message="About Updated Successfully";
        }
        else{
            $message="About Updated Without Image Successfully";
        }

        About::findOrFail($id)->update([
            'title'=>$request->title,
            'experience_content'=>$request->experience_content,
            'description'=>$request->description,
            'experience_icon'=>$imageFilename,
        ]);

        $notification = array(
            "message"=>$message,
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);

    }
}
