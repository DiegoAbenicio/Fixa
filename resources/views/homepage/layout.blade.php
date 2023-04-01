<!doctype html>
<html lang="pt-br">
<head>
  <title>Fixa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="{{ asset('css/colors.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/wave.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/secondpart/layout.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/secondpart/hub.css') }}" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <div class="svg-background">
        <svg viewBox="0 -50 1440 320" preserveAspectRatio="none">
            <path d="M0,96L40,117.3C80,139,160,181,240,208C320,235,400,245,480,240C560,235,640,213,720,186.7C800,160,880,128,960,122.7C1040,117,1120,139,1200,149.3C1280,160,1360,160,1400,160L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z" style="stroke: none; fill: var(--primarycolor);"></path>
        </svg>
    </div>
    <div class="block right"></div>



    <nav class="navbar navbar-expand-lg navbar-light top-bar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.jpg') }}" class="img-fluid m-6" style="max-width: 40px;">
            </a>
            @if (auth()->check())
                <form class="d-flex search-container">
                    <input class="form-control  rounded-pill barra" type="search" placeholder="Encontre profissionais">
                    <button class="btn rounded-pill" type="submit"><i class="input-icon uil uil-search searchicon icons"></i></button>
                </form>
            @endif
            <ul class="navbar-nav mb-2 mb-lg-0">
                @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="input-icon uil uil-constructor icons "></i></a>
                </li>
                <div class="dropdown rounded-pill dropdownstyle">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }} <i class="input-icon uil uil-user icons ml-2"></i>
                            @if (!auth()->check())
                                User <i class="input-icon uil uil-user icons ml-2"></i>
                            @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-user"></i>Perfil</a>
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-question-circle"></i>Help</a>
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-sign-out-alt"></i>Sair</a>
                    </div>
                </div>
                @else
                    <li class="nav-item">
                    <form action="{{route('movetologin')}}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="loginbox">
                            <button  href="submit" class="formbtn formbtnnav" >Login</button>
                        </div>
                    </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
        <div>
            @yield('content')
        </div>
    <script>
        document.querySelector('#dropdownMenuLink').addEventListener('click', function (event) {
            event.stopPropagation();
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

    </script>

</body>
</html>
