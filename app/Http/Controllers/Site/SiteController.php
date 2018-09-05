<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{    
    public function __construct() {
    
        //$this->middleware('auth');
        
        /*
        $this->middleware('auth')
                ->only([
                    'contato',
                    'categoria'
                    ]);
        */
        
    }
    
    public function index(){
        
        $var1 = '123';
        
        $nomes = array('juan', 'pedro', 'armando');
        
        return view('site.home.index', compact('var1', 'nomes'));
    }
    
    public function contato(){
       
        return view('site.contact.index');
    }
    
    public function categoria($id = null){
        return view('site.categoria.index', ['id' => $id]);
    }
}
