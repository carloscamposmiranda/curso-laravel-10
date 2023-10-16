@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuário</h1>
</div>

<form class="form" action="{{route('atualizar.usuario', $findUser->id)}}" method="POST">
    @csrf

    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Nome do Usuário</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($findUser->name) ? $findUser->name : old('name') }}">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"  value="{{ isset($findUser->email) ? $findUser->email : old('email') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="password" class="form-label">Nova Senha</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
    </div>
   
    <button type="reset" class="btn btn-danger">LIMPAR</button>
    <button type="submit" class="btn btn-primary">ATUALIZAR</button>
</form>

@endsection