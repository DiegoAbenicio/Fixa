<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressesController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'street' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'complement' => 'required',
            'number' => 'required',
            'users_id' => 'required',
        ]);

        Addresses::create($request->all());

        return redirect()->back();
    }

    public function addressesdelete(Request $request){
        $addresses_id = $request->addresses_id;
        $users_id = $request->users_id;

        DB::table('addresses')
            ->where('id', $addresses_id)
            ->where('users_id', $users_id)
            ->delete();


        return redirect()->back();
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
