<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Vendas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = $this->listaTotalProdutos();
        $totalClientes = $this->listaTotalClientes();
        $totalVendas = $this->listaTotalVendas();
        $totalUsuarios = $this->listaTotalUsuarios();
        return view('pages.dashboard.dashboard', compact('totalProdutos', 'totalClientes', 'totalVendas', 'totalUsuarios'));
    }

    public function listaTotalProdutos()
    {
        $totalProdutos = Produto::all()->count();

        return $totalProdutos;
    }

    public function listaTotalClientes()
    {
        $totalClientes = Cliente::all()->count();

        return $totalClientes;
    }

    public function listaTotalVendas()
    {
        $totalVendas = Vendas::all()->count();

        return $totalVendas;
    }

    public function listaTotalUsuarios()
    {
        $totalUsuarios = User::all()->count();

        return $totalUsuarios;
    }
}
