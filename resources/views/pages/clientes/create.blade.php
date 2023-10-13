@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro de Cliente</h1>
</div>

<form class="form" action="{{route('cadastrar.cliente')}}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nmcliente" class="form-label">Nome do Cliente</label>
            <input type="text" class="form-control" id="nmcliente" name="nmcliente" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control cep" id="cep" name="cep">
        </div>
        <div class="col-md-6">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro">
        </div>
        <div class="col-md-6">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro">
        </div>
    </div>
    <button type="reset" class="btn btn-danger">LIMPAR</button>
    <button type="submit" class="btn btn-primary">CADASTRAR</button>
</form>

@endsection