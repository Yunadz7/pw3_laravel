<?php
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/produtos', [ProdutoController::class , 'index']);
Route::post('/produtos', [ProdutoController::class , 'store']);
