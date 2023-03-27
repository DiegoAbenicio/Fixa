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
            <form class="d-flex search-container">
                <input class="form-control  rounded-pill barra" type="search" placeholder="Encontre profissionais">
                <button class="btn rounded-pill" type="submit"><i class="input-icon uil uil-search searchicon icons"></i></button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="input-icon uil uil-constructor icons "></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Users<i class="input-icon uil uil-user icons ml-2"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>

</body>
</html>
