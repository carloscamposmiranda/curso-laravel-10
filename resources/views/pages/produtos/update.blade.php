@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar de Produto</h1>
</div>
<form class="form" action="{{ route('atualizar.produto', $findProduto->id) }}" method="POST">
    @csrf
    
    @method('PUT')

    <div class="mb-3">
        <label for="nmproduto" class="form-label">Nome</label>
        <input type="text" class="form-control @error('nmproduto') is-invalid  @enderror" name="nmproduto" id="nmproduto" value="{{ isset($findProduto->nmproduto) ? $findProduto->nmproduto : old('nmproduto') }}">
        @error('nmproduto')
            <div class="invalid-feedback">O Nome do Produto é obrigatório</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="valorp" class="form-label">Valor</label>
        <input type="text" class="form-control @error('valorp') is-invalid  @enderror money" name="valorp" id="valorp" value="{{ isset($findProduto->valorp) ? $findProduto->valorp : old('valorp') }}">
        @error('valorp')
            <div class="invalid-feedback">O Valor do Produto é obrigatório</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">ATUALIZAR</button>

</form>
@endsection