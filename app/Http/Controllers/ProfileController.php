<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profileRegister(){
        return view('profile-register');
    }
}
