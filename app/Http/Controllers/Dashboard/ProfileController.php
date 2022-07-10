<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard.profiles.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.profiles.edit', compact('user'));
    }

}
