@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1>Carrito de Compras</h1>
</div>
@if(session('cart'))
<div class="row">
    <pre>
        <div class="col s8">
            <table>
                <thead>
                    <tr>
                        <th>Nombre Producto</th>
                        <th>Cantidad Producto</th>
                        <th>Precio Producto</th>
                 
                    </tr>
                </thead>
                <tbody>
                @foreach(session('cart') as $producto)
                    <tr>
                        <td>{{$producto[0]["nombre"]}}</td>
                        <td>{{$producto[0]["cantidad"]}}</td>
                        <td>{{$producto[0]["precio"]}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </pre> 
</div>
@else
<strong>
    No hay items en el carrito
</strong>
@endif
<div class="row">
    <form method="POST" action="{{route('cart.destroy', 1)}}">
        @method('DELETE')
        @csrf
    <button class="btn waves-effect purple lighten-3" type="submit" name="action">
                    <i class="material-icons right">Eliminar Carrito =D</i>
    
       
</form>
</div>

@endsection