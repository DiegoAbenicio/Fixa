<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Services;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HubController extends Controller
{
    public function index(){

        try{
            $user_id = auth()->user()->id;

            $services = Services::all();

            $addresses = DB::table('addresses')
                ->join('users', 'users.id', '=', 'addresses.users_id')
                ->where('users.id', $user_id)
                ->select(
                    'addresses.id', 'addresses.street',
                    'addresses.district', 'addresses.city',
                    'addresses.number', 'addresses.complement',
                    'addresses.state', 'addresses.users_id',
                    'addresses.created_at', 'addresses.updated_at')
                ->get();

            return view('homepage.hub', compact('services', 'addresses'));
        }catch(ErrorException $e){
            return view('homepage.hub');
        }
    }
}
