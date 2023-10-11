<?php

namespace App\Http\Controllers;

//use App\Http\Requests\FormRequestCliente;
use App\Http\Requests\FormRequestClientes;
use App\Models\Componentes;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    //criando o construtor para sempre a classe chamar a model
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente ;
    }
    //
    public function index(Request $request)
    {

        $input = $request->all();
        $pesquisar = (isset($input['pesquisar'])) ? $input['pesquisar'] : '' ;
        $findCliente = $this->cliente->getClientesPesquisarIndex($pesquisar);
        //$findCliente = $this->cliente::all();
        return view('pages.clientes.paginacao', compact("findCliente"));

    }


    /**Deleta um registro do banco de dados
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function delete(Request $request)
    {
        $input = $request->all();
        $id = (isset($input['id'])) ? $input['id'] : '' ;
        $busca = $this->cliente->find($id);
        $busca->delete();
        return response()->json([
            'success'   => true
        ] , 200);

    }


    /** TRocamos para em ves de receber apenas o request , recebermos o FormRequestCliente
     * Que criamos para validar os dados do formulário
     * @param FormRequestCliente $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function cadastrarCliente(FormRequestClientes $request)
    {
        if ($request->method() == 'POST'){
            $data = $request->all() ;

            $this->cliente->create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('cliente.index');

        }

        //caso contrario de post vai ser get entao vamos devolver uma view
        return view('pages.clientes.create');
    }

    public function edit(FormRequestClientes $request , $id){

        if ($request->method() == 'PUT'){
            //atualiza cliente por id
            $data = $request->all() ;
            $buscaRegistro = Cliente::find($id);


            //$buscaRegistro usar o carregamento da classe para chamar o update
            $buscaRegistro->update($data);
            Toastr::success('Cliente atualizado com sucesso');
            return redirect()->route('cliente.index');
        }

        //caso contrario de put vai ser get entao vamos devolver uma view com os dados
        $findCliente = Cliente::where('id', '=' , $id)->first();
        return view('pages.clientes.atualiza' , compact("findCliente"));
    }
}
