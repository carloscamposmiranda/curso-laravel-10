@extends('index')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>
<div>
    <form action="{{route('vendas.index')}}" method="GET">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="Digite o nome do produto">
            </div>
            <div class="col-md-3 pull-left">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            
                <a href="{{ route('cadastrar.venda') }}" class="btn btn-success float-end">Adicionar</a>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-4 py-3">
        @if ($findVendas->isEmpty())
            <h3 class="text-center">Produto não encontrado! :(</h3>            
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">COD.</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findVendas as $venda)
                <tr>
                    <td>{{$venda->numero_da_venda}}</td>
                    <td>{{$venda->produto->nmproduto}}</td>
                    <td>{{$venda->cliente->nmcliente}}</td>
                    <td> 
                        <a href="{{route('sendEmailCompra.venda', $venda->id)}}" class="btn btn-light btn-sm">
                            Enviar E-mail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection