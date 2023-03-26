<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Fixa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/wave.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>
<body>
    <div class="svg-background">
        <svg viewBox="0 0 500 500" preserveAspectRatio="none">
            <path d="M0,100 C150,200 350,0 500,100 L500,00 L0,0 Z" style="stroke: none; fill: var(--primarycolor);"></path>
        </svg>
    </div>
    <div class="block right"></div>
    <div class="row box">
        <div class="col-8">
            <div class="section texto">
                <div class="container">
                    <div class="full-height justify-content-center">
                        <div class="text-left align-self-left py-5">
                            <div class="center-wrap boxdescripition">
                                <div class="form-row d-flex">
                                        <div class="form-group d-flex">
                                            <div class="align-self-start">
                                                <img src="{{ asset('img/logo.png') }}" class="img-fluid m-6" style="max-width: 40px;">
                                            </div>
                                                <div style="margin-left: 10px;">
                                                <h2>Fixa</h2>
                                                <p class="text-justify">Fixa é um site que te conecta com profissionais qualificados para consertar, instalar ou limpar o que você precisar. Você pode solicitar serviços de mecânica, pintura, eletricidade, jardinagem, marcenaria e muito mais, com rapidez e segurança. Basta escolher o serviço desejado, informar o local e o horário, e pronto! Um profissional irá até você e resolverá o seu problema. Fixa é a solução ideal para quem precisa de serviços de qualidade sem sair de casa.</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="section ">
                <div class="container">
                    <div class="full-height justify-content-center">
                        <div class="text-center align-self-center py-5">
                            <div class="center-wrap boxdescripition ">
                                <div>
                                    <form action="{{route('movetologin')}}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <div class="loginbox">
                                            <h6>Já possui Cadastrado?</h6>
                                            <button  href="submit" class="btn" >Logar</button>
                                        </div>
                                    </form>
                                    <form action="{{route('movetoregister')}}" method="GET" enctype="multipart/form-data>">
                                        @csrf
                                        <div class="loginbox">
                                            <h6>Não possui Cadastro?</h6>
                                            <button  href="submit" class="btn">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
