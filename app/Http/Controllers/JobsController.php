<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Joboffers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;

            $user_offers = Joboffers::where('users_id', $user_id)->get();

            $other_offers = Joboffers::where('users_id', '<>', $user_id)
                                    ->whereNotIn('id', $user_offers->pluck('id'))
                                    ->get();

            dd($user_offers , $other_offers);

            return view('homepage.jobs', [
                'user_offers' => $user_offers,
                'other_offers' => $other_offers,
            ])->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return view('homepage.jobs');
        }

    }

    public function usersjobsAjaxDataTables(Request $request){
        if ($request->ajax()) {

            $user_id = auth()->user()->id;

            $data = Joboffers::where('users_id', $user_id)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $services_id = $row->id;
                    $users_id = auth()->user()->id;
                    $actionBtn = '<tr class="sizeimg havethis">';
                    $actionBtn .= '<td>' . $row->name . '</td>';
                    $actionBtn .= '<td class="fiximg">';
                    $actionBtn .= '<a href="' . route('delete', ['services_id' => $services_id, 'users_id' => $users_id]) . '">Remover<i class="uil uil-times"></i></a>';
                    $actionBtn .= '</td></tr>';
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
