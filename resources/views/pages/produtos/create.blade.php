@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro de Produto</h1>
</div>
<form class="form" action="{{ route('cadastrar.produto') }}" method="POST">
    @csrf

        <div class="mb-3">
            <label for="nmproduto" class="form-label">Nome</label>
            <input type="text" class="form-control @error('nmproduto') is-invalid  @enderror" value="{{ old('nmproduto') }}" name="nmproduto" id="nmproduto">
            @error('nmproduto')
                <div class="invalid-feedback">O Nome do Produto é obrigatório</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="valorp" class="form-label">Valor</label>
            <input type="text" class="form-control @error('valorp') is-invalid  @enderror money" value="{{ old('valorp') }}" name="valorp" id="valorp">
            @error('valorp')
                <div class="invalid-feedback">O Valor do Produto é obrigatório</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">CADATRAR</button>

</form>
@endsection