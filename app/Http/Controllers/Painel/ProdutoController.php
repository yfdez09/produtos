<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;
    private $totalPage = 5;

    public function __construct(Product $product) {

        $this->product = $product;
    }

    public function index() {

        $title = 'Listagem dos Produtos';
        
        //Mostrar todos
        //$products = $this->product->all();
        
        //Paginando
        $products = $this->product->paginate($this->totalPage);
        
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $title = 'Cadastrar novo Producto';
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request) {
        
        //Pega todos os dados que vem do formulário
        $dataForm = $request->all();        
        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;
        
        

        //1ra manera
        //Valida os dados
        //$this->validate($request, $this->product->rules, $this->product->message); 
        
        /*
        2da manera
        $validate = validator($dataForm, $this->product->rules, $this->product->message);        
        if ($validate->fails()) {
            //return redirect()->back();
            return redirect()->route('produtos.create')
                             ->withErrors($validate)
                             ->withInput();
        }
        */      
        
        //3ra manera usando el ProductFormRequest
                
        //Faz o cadastro
        $insert = $this->product->create($dataForm);
        
        if ($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        //$product = $this->product->where('id', $id)->get();
        $product = $this->product->find($id);
        
        $title = "Produto: {$product->name}";
        
        return view('painel.products.show', compact('product', 'title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        //Recuperando
        $product = $this->product->find($id);
        
        $title = "Editando Producto {$product->id}";
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('categories', 'title', 'product'));
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id) { 
        
        //Solo recibe PUT o PATH
        
        //Recupera todos os dados do formulario
        $dataForm = $request->all(); 
             
        //Verifica se o produto esta ativado
        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;
        
        //Recupera o item para editar
        $product = $this->product->find($id);
        
        //Altera o item
        $update = $product->update($dataForm);
        
        //Verifica se realmente editou
        if ($update){
           return redirect()->route('produtos.index');
            
       }else {
           return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao Editar']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
     
        $product = $this->product->find($id);
        $delete = $product->delete();
        
        if ($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('$produtos.show', $product->id)->with(['errors' => 'Falha ao Deletar']);        
    }

    public function testes() {
        /*
          $prod = $this->product;
          $prod->name =   'Nome do Produto';
          $prod->number = 2121;
          $prod->active = true;
          $prod->category = 'eletronicos';
          $prod->description = 'Description do producto' ;

          $insert = $product->save();

          if ($insert)
          return 'Inserido com sucesso';
          else {
          return 'Falha ao inserir';
          }

         */

        /*
          $insert = $this->product->create([
          'name'          =>   'Nome do Produto 2',
          'number'        => 788,
          'active'        => false,
          'category'      => 'eletronicos',
          'description'   => 'Description do producto'
          ]);

          if ($insert)
          return 'Inserido com sucesso';
          else {
          return 'Falha ao inserir';
          }

         */

        /*
          $prod = $this->product->find(3);
          $update = $prod->update([
          'name' => 'Nome do Produto 222',
          'number' => 78888,
          'active' => true,
          'category' => 'eletronicos',
          'description' => 'Description do producto'
          ]);

          if ($update)
          return 'Alterado com sucesso';
          else {
          return 'Falha ao Alterar';
          }
         */

        $prod = $this->product->find(3);
        $delete = $prod->delete();

        if ($delete)
            return 'Deletado com sucesso';
        else {
            return 'Falha ao Deletar';
        }



        return 'testes';
    }

}
