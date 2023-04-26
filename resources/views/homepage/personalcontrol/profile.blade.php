@extends('homepage.layout')
@section('content')
@if(auth()->check())

<div class="form-row col-md-12 text-center align-self-center">
    <div class="form-row col-md-4 profileinfo">
        <div class="form-group">
            <div class="pt-4">
                <img src="{{ asset('uploads/' .  $user->icon) }}" class="profile-pic rounded-circle profile-page-icon">
            </div>
            <div class="pt-3">
                <h4>{{ $user->name }}</h4>
            </div>
            <div>
                <h6>
                    Jobs:
                    @foreach ($userservices as $key => $value)
                        @if (!$loop->last)
                         {{ $value->name }},
                        @else
                         {{ $value->name }}
                        @endif
                    @endforeach
                </h6>
            </div>
            <div class="pt-1 pl-2 form-row col-md-12">
                Descrição:
                <div class="descripition-area col-md-12">


                    @if($user->id = auth()->id())
                        <form class="was-validate" action="{{ route('profile.attDescription')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea class="form-control textspace" name="description" id="description" >{{ $user->description }}</textarea>
                            <input type="hidden" id="users_id" name="users_id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="formbtn changeback">Salvar</button>
                        </form>
                    @else
                        <p>
                            {{ $user->description }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="form-row col-md-7 profileinfo">
        <div class="form-group">

        </div>
    </div>
</div>


@endif
@endsection
