<?php

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('banho_tosa','Admin\BanhoTosaController@index')->name('admin.banho_tosa.index');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('clientes', 'Admin\ClienteController', ["as" => 'admin']);
    Route::resource('pets', 'Admin\PetController', ["as" => 'admin']);
    Route::resource('servicos', 'Admin\ServicoController', ["as" => 'admin']);
    Route::resource('hospedagens', 'Admin\HospedagemController', ["as" => 'admin']);   
    
});

Route::get('admin/servicos/create/{id}', 'Admin\ServicoController@create')->name('admin.servicos.create.id');


Route::get('admin/hospedagens/create/{id}', 'Admin\HospedagemController@create')->name('admin.hospedagens.create.id');

Route::get('pets_sugest','Admin\PetController@pets_sugest')->name('pets_sugest');

Route::resource('data1s', 'Data1Controller');

Route::get('imagem/{id}/{size}','Admin\PetController@imagem');

Route::get('test','TestController@index');