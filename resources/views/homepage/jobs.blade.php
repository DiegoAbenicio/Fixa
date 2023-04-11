@extends('homepage.layout')
@section('content')
@if (auth()->check())
<div class="form-row col-md-12">

    <div class="form-row col-md-5 contentbox">
        <div class="form-row justify-content-center col-md-12">
            <h6 class="mb-0 pb-3"><span>Suas Ofertas </span></h6>
		    <input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="your-log" name="your-log"/>
            <label for="your-log"></label>
            <h6 class="mb-0 pb-3"><span>Ofertas aceitas </span></h6>
        </div>

        <div class="form-group col-md-12 jobsbox">

        </div>

    </div>

    <div class="form-row col-md-5 contentbox">
        <div class="form-row justify-content-center col-md-12">
            <h6 class="mb-0 pb-3"><span>Ofertas disponiveis </span></h6>
		    <input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="another-log" name="another-log"/>
            <label for="another-log"></label>
            <h6 class="mb-0 pb-3"><span>Ofertas aceitas </span></h6>
        </div>


        <div class="form-group col-md-12 jobsbox">

        </div>

    </div>
</div>
@else

@endif
@endsection
