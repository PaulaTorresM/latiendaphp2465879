<?php


use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    return view('welcome');
});

//ruta paises
Route::get('paises', function(){
    $paises=[
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "peso",
            "poblacion" => 51.6,
            "ciudades" => [
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "sol",
            "poblacion" => 32.9,
            "ciudades" => [
                "Puno",
                "Chiclayo",
                "Chimbote"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "guarani",
            "poblacion" => 71.3,
            "ciudades" => [
                "Capiata",
                "Ñembi",
                "Villa Elisa"
            ]
        ]
    ];
    //mostrar la vista de paises
    return view('paises')
    ->with("paises" , $paises);

});

Route::get('prueba', function(){
return view('productos.new');
});

//Rutas REST
//Producto

Route::resource('productos' , ProductoController::class);

Route::resource('cart' , CartController::class, ['only' => ['store', 'destroy', 'index']]);