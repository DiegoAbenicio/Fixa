<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Joboffers;
use App\Models\Servicescaught;
use App\Models\Workers;
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


    public function anotheracceptAjaxDataTables(Request $request)
    {
        if ($request->ajax()) {
            $user_id = auth()->user()->id;

            $user_offers_caught = Servicescaught::select('servicescaughts.id')
                ->where('users_id', $user_id)
                ->get();

            $data = Servicescaught::select('servicescaughts.*', 'users.name as user_name', 'services.name as service_name', 'addresses.street as address_street', 'addresses.city as address_city', 'workers_id')
                ->join('users', 'users.id', '=', 'servicescaughts.users_id')
                ->join('services', 'services.id', '=', 'servicescaughts.services_id')
                ->join('addresses', 'addresses.id', '=', 'servicescaughts.address_id')
                ->where('servicescaughts.users_id', '<>', $user_id)
                ->whereNotIn('servicescaughts.id', $user_offers_caught->pluck('id'))
                ->get();

            foreach ($data as $row) {
                $row->worker_name = auth()->user()->name;
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('worker_name', function($row) {
                    return $row->worker_name ?? '';
                })
                ->addColumn('action', function($row) use ($user_id) {
                    $id = $row->id;
                    $actionBtn = '<a href="' . route('addJob', ['id' => $id, 'users_id' => $user_id]) . '" >Add<i class="uil uil-check"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function youracceptAjaxDataTables(Request $request)
    {
        if ($request->ajax()) {
            $user_id = auth()->user()->id;

            $workers = Workers::where('users_id', $user_id)->pluck('id');

            $user_offers_caught = Joboffers::select('joboffers.id')
                ->where('users_id', $user_id)
                ->get();

            $data = Joboffers::select('joboffers.*', 'users.name as user_name', 'workers.services_id', 'services.name as service_name', 'addresses.street as address_street', 'addresses.city as address_city', 'joboffers.users_id', 'workers.users_id as worker_id', 'worker_users.name as worker_name')
                ->join('users', 'users.id', '=', 'joboffers.users_id')
                ->join('addresses', 'addresses.id', '=', 'joboffers.addresses_id')
                ->join('services', 'services.id', '=', 'joboffers.services_id')
                ->join('workers', 'workers.services_id', '=', 'services.id')
                ->join('users as worker_users', 'worker_users.id', '=', 'workers.users_id')
                ->where('joboffers.users_id', '=', $user_id)
                ->whereIn('joboffers.id', $user_offers_caught->pluck('id'))
                ->get();

            foreach ($data as $row) {
                $row->contrat_name = auth()->user()->name;
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('contrat_name', function ($row) {
                    return $row->contrat_name ?? '';
                })
                ->addColumn('worker_name', function ($row) {
                    return $row->worker_name ?? '';
                })
                ->addColumn('action', function ($row) use ($user_id) {
                    $id = $row->id;
                    $actionBtn = '<a href="' . route('removeJob', ['id' => $id]) . '">Remover<i class="uil uil-times"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
