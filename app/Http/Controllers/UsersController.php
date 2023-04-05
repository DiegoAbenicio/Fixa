<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('userscontroller.login');
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

        $password = bcrypt($request->password);

        $request->merge(['password' => $password]);

        $request->merge(['icon' => 'default_icon.jpg']);

        try {
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
        $request->validate([
            'email2' => 'required|email',
            'password2' => 'required',
        ]);

        $credentials = [
            'email' => $request->email2,
            'password' => $request->password2,
        ];

        if (Auth::attempt($credentials)) {

            //Usuario Logado com sucesso
            return redirect('/hub');
        }

        if(!Auth::attempt($credentials)){

            //Valida se ao menos o email está cadastrado
            $user = Users::where('email', $request->email2)->first();

            if($user){
                //Caso o email esteja cadastrado, retorna a mensagem de senha incorreta
                session()->flash('checkbox', false);
                session()->flash('error', 'Senha incorreta');
                return redirect()->back();
            } else{
                //Caso o email não esteja cadastrado, retorna a mensagem informando a ausência de cadastro
                session()->flash('checkbox', false);
                session()->flash('error', 'Email não cadastrado');
                return redirect()->back();
            }
        }
        } catch(QueryException $e){
            session()->flash('checkbox', false);
            session()->flash('error', 'Erro desconhecido');
            return redirect()->back();
        }


    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function config(){
        return view('homepage.personalcontrol.update');
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
        $request->validate([
            'email' => 'required|email',
            'number' => 'required',
            'name' => 'required',
        ]);


        $users = Users::find($id);

        $users->name = $request->input('name');
        $users->number = $request->input('number');
        $users->email = $request->input('email');

        if ($request->hasFile('icon')) {
            if ($request->file('icon')->isValid()) {
                $file = $request->file('icon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $users->icon = $filename;
            }
        }

        $users->save();
        return redirect()->back();

    }

    public function destroy(string $id)
    {
        $users = Users::find($id);
        $users ->delete();

        Auth::logout();

    }
}
