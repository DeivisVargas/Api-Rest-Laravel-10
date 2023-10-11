<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{


    //criando o construtor para sempre a classe chamar a model
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //
    public function index(Request $request)
    {

        $input = $request->all();
        $pesquisar = (isset($input['pesquisar'])) ? $input['pesquisar'] : '';

        $findUsuario = $this->user->getUsuariosPesquisarIndex($pesquisar);
        return view('pages.usuarios.paginacao', compact("findUsuario"));


    }


    public function delete(Request $request)
    {
        $input = $request->all();
        $id = (isset($input['id'])) ? $input['id'] : '';
        User::destroy($id);
        return response()->json([
            'success' => true
        ], 200);

    }


    /** TRocamos para em ves de receber apenas o request , recebermos o FormRequestUsuario
     * Que criamos para validar os dados do formulário
     * @param FormRequestUsuario $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function cadastrarUsuario(FormRequestUsuarios $request)
    {

        if ($request->method() == 'POST') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $this->user->create($data);
            Toastr::success('Usuário cadastrado com sucesso');
            return redirect()->route('usuario.index');
        }

        //caso contrario de post vai ser get entao vamos devolver uma view
        return view('pages.usuarios.create');
    }

    public function edit(FormRequestUsuarios $request, $id)
    {

        if ($request->method() == 'PUT') {
            //atualiza usuario por id
            $data = $request->all();
            $buscaRegistro = User::find($id);
            //$buscaRegistro usar o carregamento da classe para chamar o update
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro->update($data);
            Toastr::success('Usuário atualizado com sucesso');
            return redirect()->route('usuario.index');

        }

        //caso contrario de put vai ser get entao vamos devolver uma view com os dados
        $findUsuario = User::where('id', '=', $id)->first();
        return view('pages.usuarios.atualiza', compact("findUsuario"));

    }


}
