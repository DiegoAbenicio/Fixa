<!doctype html>
<html lang="pt-br">
<head>
  <title>Fixa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Entrar </span><span>Registrar</span></h6>
			          	<input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">

                                        <form action="{{route('users.login')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Entrar</h4>
                                                <div class="form-group">
                                                    <input type="email" class="form-style" placeholder="Email" id="email2" name="email2">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group mt-2 col-md-10">
                                                        <input type="password" class="form-style" id="password2" name="password2" placeholder="Senha">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>

                                                    <div class="form-group mt-2 col-md-2">
                                                        <button type="button" onclick="toggleLoginVisibility()"><i class="input-icon uil uil-eye eyeicon"></i></button>
                                                    </div>
                                                </div>
                                                
                                                @if (session('error'))
                                                    <div id="error-message-one" class="alert form-group mt-2 wrong">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                @if (session('success'))
                                                    <div class="alert form-group mt-2 correct">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                <button href="submit" class="btn mt-4">Entrar</button>
                                                <p class="mb-0 mt-4 text-center"><a href="" class="link">Esqueceu a sua senha?</a></p>
                                            </div>
                                        </form>

			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
                                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="section text-center">
                                                <h4 class="mb-3 pb-3">Registrar</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" id="name" name="name" placeholder="Nome Completo">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group mt-2 col-md-4 ">
                                                        <input type="tel" class="form-style" maxlength="4" id="ddd" name="ddd" placeholder="DDD">
                                                        <i class="input-icon uil uil-globe"></i>
                                                    </div>
                                                    <div class="form-group mt-2 col-md-8 ">
                                                        <input type="tel" class="form-style" maxlength="11" id="cell" name="cell" placeholder="Número de Telefone">
                                                        <i class="input-icon uil uil-phone"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-2 ">
                                                    <input type="email" class="form-style" id="email" name="email" placeholder="Email">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group mt-2 col-md-10">
                                                        <input type="password" class="form-style" id="password" name="password" placeholder="Senha">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <div class="form-group mt-2 col-md-2">
                                                        <button type="button" onclick="toggleRegisterVisibility()"><i class="input-icon uil uil-eye eyeicon"></i></button>
                                                    </div>
                                                </div>

                                                @if (session('error'))
                                                    <div id="error-message-two" class="alert form-group mt-2 wrong">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                <button href="submit" class="btn mt-4">Registrar</button>
                                            </div>
                                        </form>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>


    <script>
    function toggleLoginVisibility() {
        var passwordInput = document.getElementById('password2');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }

    function toggleRegisterVisibility() {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }

    document.getElementById('reg-log').onclick = function() {
        document.getElementById('error-message-one').style.display = 'none';
        document.getElementById('error-message-two').style.display = 'none';
    };
    </script>

</body>
</html>
