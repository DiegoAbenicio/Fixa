@extends('homepage.layout')
@section('content')

<div class="boxUp col-md-6">
    <div>
        <form class="was-validate" action="{{ route('users.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="userinfo">
                <div class="profile-pic-container rounded-circle">
                    <label for="profile-pic-input">
                        <img src="{{ asset('img/please.jpg') }}" class="profile-pic rounded-circle">
                    </label>
                    <input id="profile-pic-input" type="file" class="d-none">
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
                    <button href="submit" class="formbtn good changeback">Salvar</button>
                    <form action="{{ route('users.destroy', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button class="formbtn danger" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">Deletar Conta</button>
                    </form>
                </div>
            </div>


        </form>
    </div>

    <div class="boxDownLeft">

    </div>

    <div class="boxDownRight">

    </div>

</div>

@endsection
