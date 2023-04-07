<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function add(Request $request){
        Workers::create($request->all());
        return redirect()->back();
    }

    public function delete(Request $request){
        $services_id = $request->services_id;
        $users_id = $request->users_id;

        DB::table('workers')
            ->where('services_id', $services_id)
            ->where('users_id', $users_id)
            ->delete();


        return redirect()->back();
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
