@extends('homepage.layout')
@section('content')
@if(auth()->check())
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
                        <a href="{{ route('delete', ['services_id' => $value->id, 'users_id' => auth()->user()->id]) }}">Excluir<i class="uil uil-times"></i></a>
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
        <form class="was-validate" action="{{ route('address.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="users_id" name="users_id" value="{{ auth()->user()->id }}">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Estado</strong>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Bairro</strong>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Cidade</strong>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Rua</strong>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Complemento</strong>
                            <input type="text" class="form-control" id="complement" name="complement" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <strong>Numero</strong>
                            <input type="text" class="form-control" id="number" name="number" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                        <div class="form-group col-md-12">
                            <button type="submit" class="formbtn btnendereco changeback good">Salvar</button>
                        </div>
                </div>
            </div>
        </form>

        <div class="addresstable col-md-12" scrollbar>
            <table class="table table-bordered ">
                <tr class="backtable">
                    <th>///</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Complemento</th>
                    <th>Número</th>
                    <th>///</th>
                </tr>
                @foreach ($addresses as $key => $value)
                    <tr class="sizeimg dontthis">
                        <td>///</td>
                        <td>{{ $value->state }}</td>
                        <td>{{ $value->city }}</td>
                        <td>{{ $value->district }}</td>
                        <td>{{ $value->street }}</td>
                        <td>{{ $value->complement }}</td>
                        <td>{{ $value->number }}</td>
                        <td>
                            <a href="{{ route('addressesdelete', ['addresses_id' => $value->id, 'users_id' => auth()->user()->id]) }}"><i class="uil uil-times"></i></a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
        </div>
    </div>
</div>

@endif
@endsection
