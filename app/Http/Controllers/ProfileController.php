<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('homepage.personalcontrol.profile');
    }

    public function login(){
        $user_id = auth()->user()->id;

        $user = DB::table('users')
            ->where('id', $user_id)
            ->first();

        $userservices = DB::table('services')
            ->whereExists(function ($query) use ($user_id) {
                $query->select(DB::raw(1))
                    ->from('workers')
                    ->whereRaw('workers.services_id = services.id')
                    ->where('workers.users_id', $user_id);
            })
            ->get();

        return view('homepage.personalcontrol.profile', compact('user', 'userservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
