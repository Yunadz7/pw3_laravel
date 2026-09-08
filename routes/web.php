<?php
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

//rota para carregar o formulário get
Route::get('/usuarios/novo',[UserController::class, 'create']);

//rota para salvar os dados enviados POST
Route::post('/usuarios', [UserController::class , 'store']);


Route::get('/produtos', [ProdutoController::class , 'index']);

Route::post('/produtos', [ProdutoController::class , 'store']);

Route::get('/teste-orm', function(){
    User::create([
        'name' => 'giovana Clara Santos',
        'email' => 'giovana.santos@escola.sp.gov.br',
        'password' => '1122323',
    ]);
    return User::all();
});