@extends('layouts.menu')

@section('contenido')
@if(session('mensajito'))
<div class="row">
    <strong>
        {{session('mensajiyo')}}
        <a href="{{ route('cart.index')}}">Ir al carrito</a>
</strong>
</div>
@endif


<div class="row">
    <h1 class="center-align" >
        Catalogo de productos
</h1>

</div>

@foreach($productos as $producto)

<div class="row">
    <div class="col s8">
        <div class="card" >
            <div class="card-image">
            @if($producto->imagen === null)
                <img src="{{asset('img/productonodisponible.png')}}" alt=""/>
                @else
                <img src="{{asset('img/'.$producto->imagen)}}" alt=""/>
                @endif
            <h1 class="center-align"><span class="card-tittle">{{$producto->nombre}}</span></h1>
            </div>
            <div class="card-content">
                <p class="center-align">{{$producto->descripcion}}</p>
            </div>
            <div class="card-action">
                <a href="{{route('productos.show', $producto->id)}}">Ver detalles</a>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection