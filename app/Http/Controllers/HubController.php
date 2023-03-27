<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class HubController extends Controller
{
    public function index(){
        return view('homepage.hub');
    }
}
