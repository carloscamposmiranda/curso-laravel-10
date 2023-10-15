<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Components;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


use function Laravel\Prompts\search;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }



    public function index (Request $request){

        $pesquisar = $request->pesquisar;
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        
        return view('pages.produtos.paginacao', compact('findProduto'));
    }



    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();

        return response()->json(['situacao' => '1', 'status' => 'success', 'title' => 'Sucesso!', 'message' => 'O Produto deletado com exito.']);
        //return response()->json(['success' => true]);

    }


    public function cadastrarProduto(FormRequestProduto $request)
    {
        if($request->method() == "POST")
        {
            $data = $request->all();
            $componentes = new Components();
            $data['valorp'] = $componentes->LimpaMascara($data['valorp']);
            Produto::create($data);

            Toastr::success('Produto inserido com sucesso!');
            return redirect()->route('produto.index');
        }
        
        return view('pages.produtos.create');
    }



    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if($request->method() == "PUT"){
            $data = $request->all();
            $componentes = new Components();
            $data['valorp'] = $componentes->LimpaMascara($data['valorp']);
            $updateProduto = Produto::find($id);
            $updateProduto->update($data);

            Toastr::success('Produto atualizado com sucesso!');
            return redirect()->route('produto.index');
        }

        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.update', compact('findProduto'));
    }
}