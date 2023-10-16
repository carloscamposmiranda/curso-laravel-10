@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuarios</h1>
</div>
<div>
    <form action="{{route('usuarios.index')}}" method="GET">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="Digite o nome do cliente">
            </div>
            <div class="col-md-3 pull-left">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            
                <a href="{{ route('cadastrar.usuario') }}" class="btn btn-success float-end">Adicionar</a>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-4 py-3">
        @if ($findUser->isEmpty())
            <h3 class="text-center">Usuário não encontrado! :(</h3>            
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">COD.</th>
                    <th scope="col">NOME</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findUser as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        <a href="{{ route('atualizar.usuario', $usuario->id) }}" type="button" class="btn btn-light btn-sm">Editar</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="SwalDelete('{{ route('usuario.delete') }}',{{ $usuario->id }})" id="delete" data-id="{{$usuario->id}}" type="button" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>


@endsection