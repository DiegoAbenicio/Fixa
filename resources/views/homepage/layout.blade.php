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
  <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <div>
        @yield('content')
    </div>
    <nav class="navbar navbar-expand-lg navbar-light top-bar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.jpg') }}" class="img-fluid m-6" style="max-width: 40px;">
            </a>
            <form class="d-flex search-container">
                <input class="form-control  rounded-pill barra" type="search" placeholder="Encontre profissionais">
                <button class="btn rounded-pill" type="submit"><i class="input-icon uil uil-search searchicon icons"></i></button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="input-icon uil uil-constructor icons "></i></a>
                </li>
                <div class="dropdown rounded-pill dropdownstyle">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Users<i class="input-icon uil uil-user icons ml-2"></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-user"></i>Perfil</a>
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-question-circle"></i>Help</a>
                        <a class="dropdown-item" href="#"><i class="input-icon uil uil-sign-out-alt"></i>Sair</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <script>
        document.querySelector('#dropdownMenuLink').addEventListener('click', function (event) {
            event.stopPropagation();
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

    </script>

</body>
</html>
