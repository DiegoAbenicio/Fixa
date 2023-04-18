@extends('homepage.layout')
@section('content')
@if(auth()->check())
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
                                <table id="yajra-datatable" class="table table-bordered yajra-datatable youroffers-datatable">
                                    <thead>
                                        <tr>
                                            <th>Cidade</th>
                                            <th>Rua</th>
                                            <th>Profissional</th>
                                            <th>Valor</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
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
                                <table id="yajra-datatable" class="table table-bordered yajra-datatable anotheroffers-datatable">
                                    <thead>
                                        <tr>
                                            <th>Contratante</th>
                                            <th>Profissional</th>
                                            <th>Valor</th>
                                            <th>Endereço</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
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

    <script type="text/javascript">
        $(function () {

        var table = $('.youroffers-datatable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('usersjobs.ajax') }}",
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            },
            columns: [
                {data: 'address_city', name: 'Cidade', orderable: false, searchable: true},
                {data: 'address_street', name: 'Rua', orderable: false, searchable: true},
                {data: 'service_name', name: 'Profissional', orderable: false, searchable: true},
                {data: 'value', name: 'Valor', orderable: false, searchable: true},

                {
                    data: 'action',
                    name: 'Ação',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        var table = $('.anotheroffers-datatable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('anotherjobs.ajax') }}",
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            },
            columns: [
                {data: 'user_name', name: 'Contratante', orderable: true, searchable: true, render: function(data, type, full, meta){
                    var firstName = data.split(' ')[0];
                    return firstName;
                }},
                {data: 'service_name', name: 'Profissional', orderable: false, searchable: true},
                {data: 'value', name: 'Valor', orderable: false, searchable: true},
                {data: 'address_street', name: 'Endereço', orderable: false, searchable: true},

                {
                    data: 'action',
                    name: 'Ação',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        });


  </script>
@endif
@endsection
