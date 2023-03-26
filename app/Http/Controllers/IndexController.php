<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function login()
    {
        session()->flash('checkbox', false);
        return view('userscontroller.login');
    }

    public function register()
    {
        session()->flash('checkbox', true);
        return view('userscontroller.login');
    }
}
