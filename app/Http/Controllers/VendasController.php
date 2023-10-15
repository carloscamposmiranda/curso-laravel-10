<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestVendas;
use App\Mail\ComprovanteCompraMail;
use App\Models\Cliente;
use App\Models\Components;
use App\Models\Produto;
use App\Models\Vendas;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\search;

class VendasController extends Controller
{
    public function __construct(Vendas $vendas)
    {
        $this->vendas = $vendas;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->prequisar;
        $findVendas = $this->vendas->getVendasPesquisar(search: $pesquisar ?? '');

        return view('pages.vendas.listaVendas', compact('findVendas'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistros = Vendas::find($id);
        $buscarRegistros->delete();

        return response()->json(['situacao' => '1', 'status' => 'success', 'title' => 'Sucesso!', 'message' => 'Venda excluida com exito.']);
    }

    public function cadastrarVenda(FormRequestVendas $request)
    {
        $findSequencia = Vendas::max('numero_da_venda') + 1;
        $findCliente = Cliente::all();
        $findProduto = Produto::all();
            
        if($request->method() == "POST")
        {
            $data = $request->all();
            $componentes = new Components();
            Vendas::create($data);

            Toastr::success('Vendas Realizada com Sucesso!');
            return redirect()->route('vendas.index');
        }

        return view('pages.vendas.create', compact('findSequencia', 'findCliente', 'findProduto'));
    }

    public function sendEmailCompra($id)
    {
        $buscaVenda = Vendas::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nmproduto;
        $nomeCliente = $buscaVenda->cliente->nmcliente;
        $emailCliente = $buscaVenda->cliente->email;
        $sendMailData = [
            'nomeProduto' => $produtoNome,
            'nomeCliente' => $nomeCliente
        ];

        Mail::to($emailCliente)->send(new ComprovanteCompraMail($sendMailData));

        Toastr::success('E-mail enviado com Sucesso!');
        return redirect()->route('vendas.index'); 
    }
}
