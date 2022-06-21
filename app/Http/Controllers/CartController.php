<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar el estado de sesion
         return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $producto = [[
        "nombre" => $request->prod_nombre,
        "id" => $request->prod_id,
        "cantidad" => $request->cantidad,
        "precio" => $request->prod_precio
        ] ];

       if(!session('cart')){
        $auxiliar[] = $producto;
        
       session(['cart' => $auxiliar]);
       }else{
      
        $auxiliar = session('cart');
          //agregar nuevo item al arreglo
         $auxiliar[] = $producto;
         session(['cart'=> $auxiliar]);

           }

           return redirect('productos')
           ->with('mensajito', 'Producto añadido al carrito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       session()->forget('cart');
       return redirect('cart')
       ->with('mensaje', "carrito eliminado");
    }
}
