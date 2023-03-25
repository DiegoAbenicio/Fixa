<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->merge(['number' => $request->ddd . $request->cell]);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'password' => 'required',
        ]);

        Users::create($request->all());

        return redirect()->back();

    }


    public function login(Request $request)
    {
        $email = $request->email2;
        $password = $request->password2;
        $user = Users::where('email', $email)->first();
        if ($user) {
            $word = Users::where('password', $password)->first();
            if($word){
                return redirect('hub');
            }else{
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
