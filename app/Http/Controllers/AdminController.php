<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function loginform() {
        return view('adminlogin');
    }

    public function login(Request $request) {


        $username = $request->input('username');
        $password = $request->input('password');

        $selected = Admin::where('username', $username)->first();

        if($selected && $selected->password === $password) {
            $id = $selected->id;
            Session::put('id', $id);
            return redirect()->route('dashboard');
        }
        else {
            return redirect()->route('login');
        }


    }
}