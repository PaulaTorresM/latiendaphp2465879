@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1>
        Catalogo de productos
</h1>

</div>

@foreach($productos as $producto)

<div class="row">
    <div class="col s8">
        <div class="card">
            <div class="card-image">
            @if($producto->imagen === null)
                <img src="{{asset('img/productonodisponible.png')}}" alt=""/>
                @else
                <img src="{{asset('img/'.$producto->imagen)}}" alt=""/>
                @endif
            <h1  class="flow-text"><span class="card-tittle">{{$producto->nombre}}</span></h1>
            </div>
            <div class="card-content">
                <h2  class="flow-text">{{$producto->descripcion}}</h2>
            </div>
            <div class="card-action">
                <a href="{{route('productos.show', $producto->id)}}">Ver detalles</a>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection