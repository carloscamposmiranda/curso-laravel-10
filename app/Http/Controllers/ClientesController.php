<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Components;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;       
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientePesquisa(search: $pesquisar ?? '');

        return view('pages.clientes.listaClientes', compact('findCliente'));
    }

    public function delete (Request $request)
    {
        $id = $request->id;
        $buscaCliente = Cliente::find($id);
        $buscaCliente->delete();

        return response()->json(['situacao' => '1', 'status' => 'success', 'title' => 'Sucesso!', 'message' => 'O Cliente deletado com exito.']);
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if($request->method() == "POST")
        {
            $data = $request->all();
            $componetes = new Components();
            Cliente::create($data);

            Toastr::success('Cliente cadastrado com sucesso!');
            return redirect()->route('clientes.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id)
    {
        //dd($request);
        if($request->method() == "PUT")
        {
            $data = $request->all();
            $componetes = new Components();
            $updateCliente = Cliente::find($id);
            $updateCliente->update($data);

            Toastr::success('Cadastro do Cliente atualizado com sucesso!');
            return redirect()->route('clientes.index');
        }

        $findCliente = Cliente::where('id', '=', $id)->first();
        return view('pages.clientes.update', compact('findCliente'));
    }

}