<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    //criando o construtor para sempre a classe chamar a model
    public function __construct(Produto $produto)
    {
        $this->produto = $produto ;
    }
    //
    public function index(Request $request)
    {

        $input = $request->all();
        $pesquisar = (isset($input['pesquisar'])) ? $input['pesquisar'] : '' ;

        $findProduto = $this->produto->getProdutosPesquisarIndex($pesquisar);
        //$findProduto = $this->produto::all();
        return view('pages.produtos.paginacao', compact("findProduto"));

        /*antigo
        //$findProduto = Produto::all();
        $findProduto = $this->produto::all();
        //exemplo com where
        //$findProduto = Produto::where('nome' , '=', 'Deivis')->get();
        //compac devolve o array formatado para a pagina
        return view('pages.produtos.paginacao', compact("findProduto"));

        pode ser assim se quiser
         return view('pages.produtos.paginacao',[
            'produtos' => $findProduto
        ]);
         */

    }

    public  function delete(Request $request)
    {

        //consulta pra depois poder deletar
        $input = $request->all();
        $id = (isset($input['id'])) ? $input['id'] : '' ;
        $busca = $this->produto->find($id);
        $busca->delete();
        return response()->json([
            'success'   => true
        ] , 200);

    }


    /** TRocamos para em ves de receber apenas o request , recebermos o FormRequestProduto
     * Que criamos para validar os dados do formulário
     * @param FormRequestProduto $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == 'POST'){
            $data = $request->all() ;
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $this->produto->create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');
        }

        //caso contrario de post vai ser get entao vamos devolver uma view
        return view('pages.produtos.create');
    }

    public function edit(FormRequestProduto $request , $id)
    {

        if ($request->method() == 'PUT') {
            //atualiza produto por id
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscaRegistro = Produto::find($id);


            //$buscaRegistro usar o carregamento da classe para chamar o update
            $buscaRegistro->update($data);
            Toastr::success('Produto atualizado com sucesso');
            return redirect()->route('produto.index');
        }

        //caso contrario de put vai ser get entao vamos devolver uma view com os dados
        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact("findProduto"));

    }
   //função de login



}

