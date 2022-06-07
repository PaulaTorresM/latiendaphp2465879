@extends('layouts.menu')


@section('contenido')

<div class="row">
    <h1>{{$producto->nombre}}</h1>
</div>

<div class="row">
    <div class="col s8">
    <table class="striped">
      
          <tr>
              <th>Marca: {{$producto->marca->nombre}}</th>
              <th>Precio: ${{$producto->precio}}</th>
              <th>descripcion: {{$producto->descripcion}}</th>
              <th>Categoria: {{$producto->categoria->nombre}}</th>
              <img src="{{asset('img/'.$producto->imagen)}}" alt="" width="770"
     height="550">
             
              
          </tr>
</table>
   


    </div>
    <div class="col s4">

    <div class="row">
    <h2>Añadir al carrito</h2>
    <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="type-hidden" name="prod_id" value="{{$producto->id}}">

        
    <div class="row">
        <div class="col s4 input-field">
            <select name="cantidad" id="cantidad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
</select>
<label for="cantidad">Cantidad</label>
        </div>
        <div class="row">
            <div class="input-field col s5">
                <button class="btn waves-effect purple lighten-3" type="submit" name="action">
                    <i class="material-icons right">Añadir =D</i>
                </button>
            </div>
        </div>
</div>
    </form>
    </div>

    </div>
</div>

@endsection