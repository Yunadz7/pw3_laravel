<?php
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

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