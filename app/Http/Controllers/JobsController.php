<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Joboffers;
use App\Models\Servicescaught;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('homepage.jobs');
    }

    public function usersjobsAjaxDataTables(Request $request){

        if ($request->ajax()) {

            $user_id = auth()->user()->id;

            $data = Joboffers::select('joboffers.*', 'users.name as user_name', 'services.name as service_name', 'addresses.street as address_street', 'addresses.city as address_city')
                ->join('users', 'users.id', '=', 'joboffers.users_id')
                ->join('services', 'services.id', '=', 'joboffers.services_id')
                ->join('addresses', 'addresses.id', '=', 'joboffers.addresses_id')
                ->where('joboffers.users_id', $user_id)
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $id= $row->id;
                    $actionBtn = '<a href="' . route('removeJob', ['id' => $id]) . '">Remover<i class="uil uil-times"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function removeJob(Request $request){
        $id = $request->id;

        DB::table('joboffers')
            ->where('id', $id)
            ->delete();

        return redirect()->back();
    }

    public function anotherjobsAjaxDataTables(Request $request){

        if ($request->ajax()) {

            $user_id = auth()->user()->id;

            $user_offers = Joboffers::select('joboffers.id')
                ->where('users_id', $user_id)
                ->get();

            $data = Joboffers::select('joboffers.*', 'users.name as user_name', 'services.name as service_name', 'addresses.street as address_street', 'addresses.city as address_city')
                ->join('users', 'users.id', '=', 'joboffers.users_id')
                ->join('services', 'services.id', '=', 'joboffers.services_id')
                ->join('addresses', 'addresses.id', '=', 'joboffers.addresses_id')
                ->where('joboffers.users_id', '<>', $user_id)
                ->whereNotIn('joboffers.id', $user_offers->pluck('id'))
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $id= $row->id;
                    $users_id = auth()->user()->id;
                    $actionBtn = '<a href="' . route('addJob', ['id' => $id, 'users_id' => $users_id]) . '" >Add<i class="uil uil-check"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
    }

    public function addJob(Request $request){
        $joboffer = DB::table('joboffers')
            ->where('id', $request->id)
            ->first();

        $worker =  DB::table('workers')
                    ->where('services_id', $joboffer->services_id)
                    ->where('users_id', $request->users_id)
                    ->first();

        if($worker){
            Servicescaught::create([
                'users_id' => $joboffer->users_id,
                'services_id' => $joboffer->services_id,
                'workers_id' => $worker->id,
                'address_id' => $joboffer->addresses_id,
                'data' => $joboffer->data,
                'value' => $joboffer->value,
                'description' => $joboffer->description,
            ]);


            Joboffers::find($joboffer->id)->delete();
        }

        return redirect()->back();

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
