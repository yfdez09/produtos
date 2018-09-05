<?php

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@index');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/categoria/{id?}', 'SiteController@categoria');
    //Route::get('/categoria/{id?}', 'SiteController@categoria')->middleware('auth');

});

Route::get('/painel/produtos/testes', 'Painel\ProdutoController@testes');
Route::resource('/painel/produtos', 'Painel\ProdutoController');

