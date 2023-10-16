<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormaRequestUsuario;
use App\Models\Components;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;       
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUser = $this->user->getUserPesquisa(search: $pesquisar ?? '');

        return view('pages.usuarios.listaUsuarios', compact('findUser'));
    }

    public function delete (Request $request)
    {
        $id = $request->id;
        $buscaUser = User::find($id);
        $buscaUser->delete();

        return response()->json(['situacao' => '1', 'status' => 'success', 'title' => 'Sucesso!', 'message' => 'Usuário deletado com exito.']);
    }

    public function cadastrarUsuario(FormaRequestUsuario $request)
    {
        if($request->method() == "POST")
        {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Usuário cadastrado com sucesso!');
            return redirect()->route('usuarios.index');
        }

        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(FormaRequestUsuario $request, $id)
    {
        //dd($request);
        if($request->method() == "PUT")
        {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $updateUser = User::find($id);
            $updateUser->update($data);

            Toastr::success('Usuário atualizado com sucesso!');
            return redirect()->route('usuarios.index');
        }

        $findUser = User::where('id', '=', $id)->first();
        return view('pages.usuarios.update', compact('findUser'));
    }
}
