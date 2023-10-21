@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produtos Cadastrados</h5>
              <p class="card-text">Total de produtos cadastrados no sistema</p>
              <a href="#" class="btn btn-primary">{{$totalProdutos}}</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Clientes Cadastrados</h5>
              <p class="card-text">Total de clientes cadastrados no sistema</p>
              <a href="#" class="btn btn-primary">{{$totalClientes}}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendas</h5>
              <p class="card-text">Total de Vendas cadastradas</p>
              <a href="#" class="btn btn-primary">{{$totalVendas}}</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Usuários</h5>
              <p class="card-text">Total de usuarios cadastrados no sistema</p>
              <a href="#" class="btn btn-primary">{{$totalUsuarios}}</a>
            </div>
          </div>
        </div>
      </div>
@endsection