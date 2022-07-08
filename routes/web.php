<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Req\PedController;
use App\Http\Controllers\Req\BarmanDatas;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('popBar', function () {
    return view('inicial');
})->name('popbar');

Route::get('popBar/barman', function () {
    return view('Barman.welcomeBarman');
})->name('barman');

Route::match(["get","post"], "popBar/pedidos", [PedController::class, 'store'])->name("pedidos.store");

// Cai no método index justamente para listar os dados do banco para o usuário
Route::match(["get","post"], "popBar/barman/coqueteis", [BarmanDatas::class, 'index']);//->name("pedidos.store");
// para deletar dados de acordo com id, claro
Route::post('popBar/barman/coqueteis/excluir',  [BarmanDatas::class, 'destroy']); //->name("pedidos.store");
Route::post('popBar/barman/coqueteis/atualizar',  [BarmanDatas::class, 'update']); //->name("pedidos.store");