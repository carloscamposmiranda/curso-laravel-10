@extends('index')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cliente</h1>
</div>
<div>
    <form action="{{route('clientes.index')}}" method="GET">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="Digite o nome do cliente">
            </div>
            <div class="col-md-3 pull-left">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            
                <a href="{{ route('cadastrar.cliente') }}" class="btn btn-success float-end">Adicionar</a>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-4 py-3">
        @if ($findCliente->isEmpty())
            <h3 class="text-center">Cliente não encontrado! :(</h3>            
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">COD.</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">ENDEREÇO</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findCliente as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nmcliente}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td>
                        <a href="{{ route('atualizar.cliente', $cliente->id) }}" type="button" class="btn btn-light btn-sm">Editar</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="SwalDelete('{{route('cliente.delete')}}', {{$cliente->id}})" id="delete" data-id="{{$cliente->id}}" type="button" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection