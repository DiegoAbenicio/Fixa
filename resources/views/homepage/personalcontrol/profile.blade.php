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
            <div class="pt-1 pl-2 form-row">
                Descrição:
                <div class="text-justify descripition-area" scrollbar>


                    @if(!$user->id = auth()->id())
                        
                    @else
                        <p>
                            Donec bibendum neque a metus viverra suscipit. In accumsan luctus suscipit.
                            Proin et massa libero. Nunc et leo mollis, semper elit vel, dictum enim.
                            In nec gravida lacus. Praesent cursus, enim sit amet lobortis pellentesque, leo augue semper ex,
                            sed semper quam velit vitae ipsum. Vestibulum quis ipsum sit amet nisi euismod accumsan.
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
