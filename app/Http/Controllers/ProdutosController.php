<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Components;
use App\Models\Produto;
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
        if($request->method() == "POST"){
            $data = $request->all();
            $componentes = new Components();
            $data['valorp'] = $componentes->LimpaMascara($data['valorp']);
            Produto::create($data);

            return redirect()->route('produto.index');
        }
        
        return view('pages.produtos.create');
    }
}