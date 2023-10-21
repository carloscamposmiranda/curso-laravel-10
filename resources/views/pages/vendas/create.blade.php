@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastro de Vendas</h1>
</div>
<form class="form" action="{{ route('cadastrar.venda') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label form="controle" class="form-label">Controle</label>
        <input type="text" class="form-control" name="numero_da_venda" value="{{$findSequencia}}" readonly/>
    </div>
    <div class="mb-3">
        <label for="cliente_id" class="form-label">Nome</label>
        <select class="form-control @error('cliente_id') is-invalid  @enderror" name="cliente_id" id="cliente_id">
            <option value="">SELECIONE O CLIENTE</option>
            @foreach ($findCliente as $cliente )
                <option value="{{$cliente->id}}">{{$cliente->nmcliente}}</option>
            @endforeach
        </select>
        @error('cliente_id')
            <div class="invalid-feedback">O Cliente é obrigatório</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="produto_id" class="form-label">Nome</label>
        <select class="form-control @error('produto_id') is-invalid  @enderror" name="produto_id" id="produto_id">
            <option value="">SELECIONE O PRODUTO</option>
            @foreach ($findProduto as $produto)
                <option value="{{$produto->id}}">{{$produto->nmproduto}}</option>
            @endforeach
        </select>
        @error('produto_id')
            <div class="invalid-feedback">O Produto é obrigatório</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">CADATRAR</button>
</form>
@endsection