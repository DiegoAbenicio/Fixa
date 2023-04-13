@extends('homepage.layout')
@section('content')
<div class="form-row col-md-12">
	<div class="form-row col-md-6">
		<div class="col-12 text-center align-self-center ">
			<div class="section pb-5 pt-5 pt-sm-2 text-center ">
				<h6 class=""><span>Suas Ofertas </span></h6>
			    <input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="your-offers" name="your-offers"/>
			    <label for="your-offers"></label>
                <h6 class=""><span>Contratos realizados</span></h6>
				<div class="card-3d-wrap mx-auto">
					<div class="card-3d-wrapper jobsbox">
						<div class="card-front">
							<div class="center-wrap ">
                                teste
		      				</div>
		      				</div>
						<div class="card-back">
							<div class="center-wrap">
                                oi
			  				</div>
		      			</div>
		      		</div>
			    </div>
			</div>
		</div>
	</div>

    <div class="form-row col-md-6">
		<div class="col-12 text-center align-self-center ">
			<div class="section pb-5 pt-5 pt-sm-2 text-center ">
				<h6 class=""><span>Ofertas disponiveis</span></h6>
			    <input class="checkbox" {{ session('checkbox') ? 'checked' : '' }} type="checkbox" id="another-offers" name="another-offers"/>
			    <label for="another-offers"></label>
                <h6 class=""><span>Ofertas Aceitas</span></h6>
				<div class="card-3d-wrap mx-auto">
					<div class="card-3d-wrapper jobsbox">
						<div class="card-front">
							<div class="center-wrap ">
                                teste
		      				</div>
		      				</div>
						<div class="card-back">
							<div class="center-wrap">
                                oi
			  				</div>
		      			</div>
		      		</div>
			    </div>
			</div>
		</div>
	</div>
</div>
    <script>

    document.getElementById('your-offers').onclick = function() {
        document.getElementById('error-message-one').style.display = 'none';
        document.getElementById('error-message-two').style.display = 'none';
    };

    document.getElementById('another-offers').onclick = function() {
        document.getElementById('error-message-one').style.display = 'none';
        document.getElementById('error-message-two').style.display = 'none';
    };
    </script>


@endsection
