@extends('homepage.layout')
@section('content')

<div class="boxUp col-md-6">
    <div>
        <form class="was-validate" action="{{ route('users.update', auth()->user()->id) }}" method="PUT" enctype="multipart/form-data">
            @csrf
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
                        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->email }}" required>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button class="formbtn good changeback">Salvar</button>
                    <button class="formbtn danger">Deletar Conta</button>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
