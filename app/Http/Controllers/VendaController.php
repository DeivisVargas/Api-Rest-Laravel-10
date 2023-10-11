<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVendas;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;


class VendaController extends Controller
{
    //
    //criando o construtor para sempre a classe chamar a model
    public function __construct(Venda $venda)
    {
        $this->venda = $venda ;
    }
    //
    public function index(Request $request)
    {
        $input = $request->all();
        $pesquisar = (isset($input['pesquisar'])) ? $input['pesquisar'] : '' ;

        $findVendas = $this->venda->getVendasPesquisarIndex($pesquisar);
        return view('pages.vendas.paginacao', compact("findVendas"));

    }

    /** TRocamos para em ves de receber apenas o request , recebermos o FormRequestCliente
     * Que criamos para validar os dados do formulário
     * @param FormRequestCliente $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function cadastrarVenda(FormRequestVendas $request)
    {
        $data = $request->all() ;
        if ($request->method() == 'POST'){
            $data = $request->all() ;

            $this->venda->create($data);
            Toastr::success('Venda cadastrada');
            return redirect()->route('venda.index');

        }

        //caso contrario de post vai ser get entao vamos devolver uma view
        //Busca o numero da venda e adiciona um para ser alto incremento
        $numero = Venda::max('numero_da_venda') + 1;
        $produtos = Produto::all();
        $clientes = Cliente::all();
        return view('pages.vendas.create' , compact('numero', 'produtos' ,'clientes') );
    }



    /**Deleta um registro do banco de dados
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function delete(Request $request)
    {
        $input = $request->all();
        $id = (isset($input['id'])) ? $input['id'] : '' ;
        $busca = $this->venda->find($id);
        $busca->delete();
        return response()->json([
            'success'   => true
        ] , 200);

    }


    /**Envia comprovante da venda por email
     * @param $id int Id da venda para carregar os dados
     * @return void
     */
    public function enviaComprovanteEmail($id){
        //buscando dados da venda pela modelagem
        $buscaVenda         = Venda::where('id', '=' , $id)->first();
        $cliente_email      = $buscaVenda->cliente->email ;
        $produto_nome       = $buscaVenda->produto->nome ;

        $sendMailData = [
            'produtoNome'   => $produto_nome,
            'clienteNome'   => $buscaVenda->cliente->nome
        ];

        Mail::to($cliente_email)->send( new ComprovanteDeVendaEmail($sendMailData));
        Toastr::success('Email enviado');
        return redirect()->route('venda.index');


    }



}
