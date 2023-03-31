@extends('homepage.layout')
@section('content')
<div class="box col-md-6">
    <form class="was-validate" action="{{ route('joboffers.store') }}" method="POST" enctype="multipart/form-data">

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-8">
                <strong>Profissional</strong>
                <input type="text" class="form-control" id="services_id" placeholder="Insira o profissional necesserário" required>
            </div>
            <div class="form-group col-md-4">
                <strong>Data</strong>
                <input type="date" class="form-control" id="date" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-7">
                <strong>Endereço</strong>
                <input type="text" class="form-control" id="address" placeholder="Insira o endereço" required>
            </div>
            <div class="form-group col-md-5">
                <strong>Valor</strong>
                <input type="text" class="form-control" id="value" placeholder="Valor de pagamento" required>
            </div>
        </div>

        <div class="form-group textplace">
            <strong>Descrição</strong>
             <textarea class="form-control textspace" name="descripition" placeholder="Entre com a descrição" required></textarea>
        </div>

        <button href="submit" class="formbtn mt-4">Entrar</button
    </form>
</div>

@endsection
