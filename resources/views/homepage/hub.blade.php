@extends('homepage.layout')
@section('content')

@if(auth()->check())
<div class="box col-md-6">
    <form class="was-validate" action="{{ route('joboffers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="users_id" name="users_id" value="{{ auth()->user()->id }}">
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-8">
                <strong>Endereço</strong>
                @if(count($addresses) != 0)
                    <select class="form-control selectform" id="addresses_id" name="addresses_id" required>
                        @foreach($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->state }}, {{ $address->city }} -
                                {{ $address->street }}, {{ $address->district }} - {{ $address->complement }},
                                {{ $address->number }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="text" class="form-control" placeholder="Cadastre um endereço na sua config" disabled>
                @endif
            </div>
            <div class="form-group col-md-4">
                <strong>Data</strong>
                <input type="date" class="form-control" id="data"  name="data" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-7">
                <strong>Profissional</strong>
                <select class="form-control selectform" id="services_id" name="services_id" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-5">
                <strong>Valor</strong>
                <input type="text" class="form-control" id="value" name="value" placeholder="Valor de pagamento" required>
            </div>
        </div>

        <div class="form-group texto">
            <strong>Descrição</strong>
            <textarea class="form-control textspace" id="description" name="description" placeholder="Entre com a descrição" required></textarea>
        </div>

        <button href="submit" class="formbtn mt-4">Enviar Oferta</button
    </form>
</div>
@endif
@endsection
