@extends('homepage.layout')
@section('content')
<div class="box col-md-6">
    <form class="was-validate" action="{{ route('joboffers.store') }}" method="POST" enctype="multipart/form-data">

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-8">
                <strong>Profissional</strong>
                <input type="text" class="form-control" id="services_id">
            </div>
            <div class="form-group col-md-4">
                <strong>Data</strong>
                <input type="date" class="form-control" id="date">
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-7">
                <strong>Endereço</strong>
                <input type="text" class="form-control" id="address">
            </div>
            <div class="form-group col-md-5">
                <strong>Valor</strong>
                <input type="text" class="form-control" id="value">
            </div>
        </div>

        <div class="form-group">
            <strong>Descrição</strong>
             <textarea class="form-control textspace" name="descripition" placeholder="Entre com a descrição" required></textarea>
        </div>

        <button href="submit" class="btn mt-4">Entrar</button
    </form>
</div>

@endsection
