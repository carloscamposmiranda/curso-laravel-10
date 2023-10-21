@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro de Usuario</h1>
</div>

<form class="form" action="{{route('cadastrar.usuario')}}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Nome do Usuário</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
       
    </div>
    
    <button type="reset" class="btn btn-danger">LIMPAR</button>
    <button type="submit" class="btn btn-primary">CADASTRAR</button>
</form>

@endsection