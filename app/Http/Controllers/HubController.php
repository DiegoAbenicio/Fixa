<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class HubController extends Controller
{
    public function index(){

        $services = Services::all();
        return view('homepage.hub', compact('services'));
    }
}
