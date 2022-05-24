<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use App\Models\Categoria;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'aqui va a ir el catalogo de productos';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //seleccionar categorias y marcas
        $marcas = Marca::all();
        $categoria = Categoria::all();

        return view("productos.new") 
        ->with("marcas", $marcas)
        ->with("categorias", $categoria);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $reglas = [
            "nombre" => 'required|alpha',
            "descripcion" => 'required|min:10|max:30',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required'

        ];

        //mensajes personalizados
        $mensaje = [
            "required" => "Campo obligatorio",
            "numeric" => "solo numeros",
            "alpha" => "solo letras"

        ];

        //crear objeto validador
        $v = Validator::make($r->all(), $reglas, $mensaje);

        //validar metodo fails
        //retorna true en caso de validacion falsa y false en caso de validacion verdadera

        if($v->fails()){

            //validacion fallida
            //redirecciono al formulario de nuevo producto
            var_dump($v->errors());
            return redirect('productos/create')
            ->withErrors($v)
            ->withInput();
             

        }
else{//validacion correcta
//crear entidad de producto
$p = new Producto;
//asignar valores a astributos del nuevo producto
$p->nombre=$r->nombre;
$p->descripcion=$r->descripcion;
$p->precio=$r->precio;
$p->marca_id=$r->marca;
$p->categoria_id=$r->categoria;
$p->save();
//redireccionar a la ruta
return redirect('productos/create')
        ->with('mensaje', 'Producto Registrado');
        

        }
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va la informacion del producto cuyo ID es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va a ir el formulario de edicion del producto cuyo ID es: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
