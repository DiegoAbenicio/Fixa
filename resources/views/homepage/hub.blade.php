@extends('homepage.layout')
@section('content')
<form>
    <div class="form-group">
        <label for="search">Pesquisa</label>
        <input type="text" class="form-control" id="search">
    </div>
    <div class="form-group">
        <label for="date">Data</label>
        <input type="date" class="form-control" id="date">
    </div>
    <div class="form-group">
        <label for="string1">String 1</label>
        <input type="text" class="form-control" id="string1">
    </div>
    <div class="form-group">
        <label for="string2">String 2</label>
        <input type="text" class="form-control" id="string2">
    </div>
    <div class="form-group">
        <label for="text">Texto</label>
        <textarea class="form-control" id="text"></textarea>
    </div>
</form>

@endsection
