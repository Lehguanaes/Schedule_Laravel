<?php

use Illuminate\Support\Facades\Route;
use App\Models\Clientes;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Rota após o Cadastro do Cliente ser realizado
Route::post('/cadastrar-cliente', function (Request $request) {
    Clientes::create([
        'nome_cliente' => $request->nome_cliente,
        'telefone_cliente' => $request->telefone_cliente,
        'tipo_telefone_cliente' => $request->tipo_telefone_cliente,
        'data_cadastro_cliente' => $request->data_cadastro_cliente,
        'observacao_cliente' => $request->observacao_cliente,
    ]);

    return redirect('/')->with('success', 'Cliente cadastrado com sucesso!');
});

// Rota para listar as informações de um Cliente cadastrado
Route::get('/listar-cliente/{id}', function ($id) {
    $clientes = Clientes::find($id);
    return view('listar', ['clientes' => $clientes]);
});

// Rota para Consultar as informações de todos os Clientes cadastrados
Route::get('/consultar', function () {
    $clientes = Clientes::all();
    return view('consultar', ['clientes' => $clientes]);
});

// Rota para Editar um Cliente cadastrado
Route::get('/editar-cliente/{id}', function ($id) {
    $clientes = Clientes::find($id);
    return view('editar', ['clientes' => $clientes]);
});
Route::post('/editar-cliente/{id}', function (Request $request, $id) {
    $clientes = Clientes::find($id);

    $clientes->update([
        'nome_cliente' => $request->nome_cliente,
        'telefone_cliente' => $request->telefone_cliente,
        'tipo_telefone_cliente' => $request->tipo_telefone_cliente,
        'data_cadastro_cliente' => $request->data_cadastro_cliente,
        'observacao_cliente' => $request->observacao_cliente,
    ]);

    return redirect('/listar-cliente/' . $id)->with('success', 'Cliente editado com sucesso!');
});

// Rota para Excluir um Cliente cadastrado
Route::delete('/excluir-cliente/{id}', function ($id) {
    $cliente = Clientes::findOrFail($id);
    $cliente->delete();

    return redirect('/consultar')->with('success', 'Cliente excluído com sucesso!');
})->name('clientes.excluir');
?>