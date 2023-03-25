<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
        try {
            $request->merge(['number' => $request->ddd . $request->cell]);

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'password' => 'required',
            ]);

            Users::create($request->all());
            session()->flash('success', 'Usuário cadastrado com sucesso');
            return redirect()->back();

        }catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                session()->flash('checkbox', true);
                session()->flash('error', 'Email ou Número já cadastrado');
                return redirect()->back();
            } else {
                session()->flash('checkbox', true);
                session()->flash('error', 'Erro desconhecido');
                return redirect()->back();
            }
        }

    }


    public function login(Request $request)
    {
        try{
            $email = $request->email2;
            $password = $request->password2;
            $user = Users::where('email', $email)->first();
            if ($user) {
                $word = Users::where('password', $password)->first();
                if($word){
                    return redirect('hub');
                }else{
                    session()->flash('checkbox', false);
                    session()->flash('error', 'Senha incorreta');
                    return redirect()->back();
                }
            } else {
                session()->flash('checkbox', false);
                session()->flash('error', 'Email não cadastrado');
                return redirect()->back();
        }
        }catch(QueryException $e){
                session()->flash('checkbox', false);
                session()->flash('error', 'Erro desconhecido');
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
