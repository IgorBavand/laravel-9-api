<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        return Produto::paginate(10);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {

        $produto = new Produto;
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;

            $extensao = $requestImage->extension();
            $imagemName = md5(strtotime("now")) .".". $extensao;
            $requestImage->move(public_path('img/produtos'), $imagemName);

            $produto->imagem = $imagemName;

         }

        if( $produto->save() ){
            return  $produto;
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return $request->input('nome');

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->input('nome') ? $request->input('nome') : $produto->nome;
        $produto->descricao = $request->input('descricao') ? $request->input('descricao') : $produto->descricao;
        $produto->preco = $request->input('preco') ? $request->input('preco') : $produto->preco;

        if( $produto->save() ){
          return $produto;
        }
    }

    public function findById($id){
        return Produto::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $retorno = $produto;
        $produto->delete();
        return $retorno;
    }
}
