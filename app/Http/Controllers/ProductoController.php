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
        //SELECCION DE TODOS LOS PRODUCTOS

        $productos = Producto::all();
        //mostrar la vista del catalogo llevando la lista de productos
        return view('productos.index')
        ->with('productos', $productos);

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
            "nombre" => 'required|alpha|unique:productos,nombre',
            "descripcion" => 'required|min:10|max:30',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'


        ];

        //mensajes personalizados
        $mensaje = [
            "required" => "Campo obligatorio",
            "min"  => "el campo debe tener minimo 10 caracteres",
            "numeric" => "solo numeros",
            "alpha" => "solo letras",
            "image" => "El archivo debe ser tipo png o jpg",
            "unique" => "El nombre que eligio no esta disponible"
            

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
else{
    //asignar a una variable nombre_archivo
   $nombre_archivo =  $r->imagen->getClientOriginalName();

   $archivo = $r->imagen;
   //mover el archivo en la carpeta public
  $ruta = public_path().'/img';
  $archivo->move($ruta, $nombre_archivo);

    
    
    //validacion correcta
//crear entidad de producto
$p = new Producto;
//asignar valores a astributos del nuevo producto
$p->nombre=$r->nombre;
$p->descripcion=$r->descripcion;
$p->precio=$r->precio;
$p->imagen=$nombre_archivo;
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
        $producto = Producto::find($producto);
        //mostrar vista de detalles llevandole el producto seleccioando
        return view ('productos.details')
        ->with('producto', $producto);

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
