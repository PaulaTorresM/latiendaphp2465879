<?php

use Illuminate\Support\Facades\Route;

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
            "cuidades" => [
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "sol",
            "poblacion" => 32.9,
            "cuidades" => [
                "Puno",
                "Chiclayo",
                "Chimbote"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "guarani",
            "poblacion" => 71.3,
            "cuidades" => [
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