<?php
 
namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    /*
     * 
     * Campos da tabela que poderam ser preenchidos
     * no caso de usar CREATE ao inserir
     */
    protected $fillable = [ 
        'name', 'number', 'active', 'category', 'description'        
    ];
    
    /*
     *Columnas que nao poderam ser preenchidas 
     * 
    */   
    //protected $guarded['admin'];
    
    /*
    public $rules = [
        'name' => 'required|min:3|max:100',
        'number' => 'required|numeric',
        'category' => 'required',
        'description' => 'max:1000',        
    ];
    
    */
    
    /*
    public $message = [
          'name.required' => 'O campo nome é de preenchimento obrigatorio',
          'name.min' => 'O campo nome deve ter um minimo de 3 caracteres',
          'number.numeric' => 'Precisa ser apenas números',
          'number.required' => 'O campo número é de preenchimento obrigatorio',
          'category.required' => 'O campo categoria é de preenchimento obrigatorio',            
        ];
    
    */
    
}
