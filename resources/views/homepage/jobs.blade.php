@extends('homepage.layout')
@section('content')
@if (auth()->check())
<div class="form-row col-md-12">

    <div class="form-row col-md-5 contentbox">
        <h6 class="mb-0 pb-3"><span>Entrar </span></h6>
		<input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="reg-log" name="reg-log"/>
        <label for="reg-log"></label>
        <h6 class="mb-0 pb-3"><span>Entrar </span></h6>
        <div class="form-group col-md-12 jobsbox">

        </div>
    </div>


    </div>

    <div class="form-row col-md-5 contentbox">
        <div class="col-md-12">Oi eu sou o botão</div>
        <div class="form-group col-md-12 jobsbox">
        </div>
    </div>
</div>
@else

@endif
@endsection
