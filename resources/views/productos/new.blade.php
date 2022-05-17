@extends('layouts.menu')
@section('contenido')
<div>
    <h1 class="blue-grey-text lighten-3">
        NUEVO PRODUCTO</h1>
</div>

<div class="row">
    <form class="col s8" method="POST" action="{{ url('productos' )}}">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="NombreProducto" type="text" id="nombre" name="nombre">
                <label for="nombre">Nombre del Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                <label for="descripcion">Descripcion</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8 ">
                <input placeholder="PrecioProducto" type="text" id="precio" name="precio">
                <label for="precio">Precio del Producto</label>
            </div>
        </div>
   
        <div class="row">
            <div class="col s8 input-field">
            <select name="marca" id="marca">                                
                @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach                            
            </select>
            <label for="marca">Marca</label>
            </div>
        </div>
        
        <div class="row">
            <div class="col s8 input-field">
            <select name="categoria" id="categoria">                                
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria ->nombre}}</option>
                @endforeach                            
            </select>
            <label for="categoria">Categoria</label>
            </div>
        </div>
        
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn purple lighten-3 col s3">
                    <span>Photo</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>


        </div>
        <div class="row">
            <div class="input-field col s5">
                <button class="btn waves-effect purple lighten-3" type="submit" name="action">
                    <i class="material-icons right">Guardar =D</i>
                </button>
            </div>
        </div>

    </form>
</div>
@endsection