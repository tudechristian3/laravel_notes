<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view('dashboards.users.index');
    }

    function profile(){
        return view('dashboards.users.profile');
    }

    function blog(){
        return view('dashboards.users.blog');
    }
}
