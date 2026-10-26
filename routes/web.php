<?php
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('home');
});

// Rota da listagem e painel administrativo (GET)
Route::get('/admin', [UserController::class, 'index']);

// Rotas de criação de usuários

Route::view('/landing', 'landing');

//rota para carregar o formulário get
Route::get('/usuarios/novo',[UserController::class, 'create']);

//rota para salvar os dados enviados POST
Route::post('/usuarios', [UserController::class , 'store']);

//Rotas de edição
Route::get('/usuarios/{id}/editar', [UserController::class , 'edit']);
Route::put('/usuarios/{id}', [UserController::class , 'update']);

//Rota de exclusão
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);

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
 
Route::get('lab-seguranca', function(Request $request){
    $termo = $request->query('busca', '');

    $resultadoVulneravel = [];
    $erroVulneravel = null;

    // 1. simulação didática com falha
    if ($termo !==''){
        try {
            $resultadoVulneravel = DB::select("SELECT ID, name, email FROM users WHERE name = '$termo'")
        } catch (\Exception $e){
            $erroVulneravel = $e->getMessage();
        }
    }
});