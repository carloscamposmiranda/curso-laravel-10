@extends('index')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
<div>
    <form action="{{route('produto.index')}}" method="GET">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="Digite o nome do produto">
            </div>
            <div class="col-md-3 pull-left">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            
                <button type="button" class="btn btn-success float-end">Adicionar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-4 py-3">
        @if ($findProduto->isEmpty())
            <h3 class="text-center">Produto não encontrado! :(</h3>            
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">COD.</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findProduto as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nmproduto}}</td>
                    <td>{{'R$ ' . number_format($produto->valorp, 2, ',', '.')}}</td>
                    <td>
                        <a href="" type="button" class="btn btn-light btn-sm">Editar</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="SwalDelete('{{route('produto.delete')}}', {{$produto->id}})" id="delete" data-id="{{$produto->id}}" type="button" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection