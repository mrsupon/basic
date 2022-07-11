<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('dashboard.profiles.index', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('dashboard.profiles.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name =$request->name;
        $users->username = $request->username;
        $users->email = $request->email;

        $imageFile = $request->file('profile_image_filename');
        if($imageFile){
            $imageFilename = date('YmdHis').$imageFile->getClientOriginalName();
            $imageFile->move(public_path('dashboards/profiles/uploadedImages'),$imageFilename);
            $users['profile_image'] = $imageFilename ;
        }

        $users->save();
        return redirect()->route("dashboard.profiles.index");
    }

}
