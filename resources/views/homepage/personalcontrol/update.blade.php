@extends('homepage.layout')
@section('content')


@if (auth()->check())
<div class="boxUp col-md-6">
    <div>
        <form class="was-validate" action="{{ route('users.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="userinfo">
                <div class="profile-pic-container rounded-circle">
                    <label for="profile-pic-input">
                        <img src="{{ asset('uploads/' . auth()->user()->icon) }}" class="profile-pic rounded-circle">
                    </label>
                    <input id="profile-pic-input" name="icon" type="file" class="d-none">
                </div>
                <div class="userdates">
                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-7">
                            <strong>Name</strong>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>

                        </div>
                        <div class="form-group col-md-5">
                            <strong>Telefone</strong>
                            <input type="text" class="form-control" id="number" name="number" value="{{ auth()->user()->number }}" required>
                        </div>
                    </div>
                    <div class="form-group fixemail">
                        <strong>Email</strong>
                        <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="formbtn good changeback">Salvar</button>

                </div>

        </form>

        <form action="{{ route('users.destroy', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button class="formbtn danger" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">Deletar Conta</button>
        </form>
    </div>
</div>

<div class="form-row">
    <div class="boxDownLeft col-md-4" scrollbar>
        <table class="table table-bordered">
            <tr class="backtable">
                <th>Profissões</th>
                <th><i class="uil uil-check "></i> OR <i class=" uil uil-times"></i></th>
            </tr>
            @foreach ($userservices as $key => $value)
                <tr class="sizeimg havethis">
                    <td>{{ $value->name }}</td>
                    <td class="fiximg">
                        <a href="{{ route('delete', ['services_id' => $value->id, 'users_id' => auth()->user()->id]) }}">Remover<i class="uil uil-times"></i></a>
                    </td>
                </tr>
            @endforeach


            @foreach ($service as $key => $value)
                <tr class="sizeimg dontthis">
                    <td>{{ $value->name }}</td>
                    <td class="fiximg ">
                        <a href="{{ route('add', ['services_id' => $value->id, 'users_id' => auth()->user()->id]) }}">Add<i class="uil uil-check "></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="boxDownRight col-md-7">
        

    </div>
</div>

@else

    <div class="blackbox">
            LOGUE NO SITE PARA ACESSAR ESTES CONTÉUDOS
    </div>

@endif


@endsection
