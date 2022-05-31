@extends('layouts.menu')
@section('contenido')
@if(session('mensaje'))
<div class="row">
    {{session('mensaje')}}
</div>
@endif()
<div>
    <h1 class="blue-grey-text lighten-3">
        NUEVO PRODUCTO</h1>
</div>

<div class="row">
    <form class="col s8" method="POST" action="{{ url('productos' )}}"

    enctype="multipart/form-data"
    
    >
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="NombreProducto" type="text" id="nombre" name="nombre" value ="{{ old('nombre')}}">
                <label for="nombre">Nombre del Producto</label>
                <span>{{$errors->first('nombre')}}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{ old('descripcion')}}</textarea>
                <label for="descripcion">Descripcion</label>
                <span>{{$errors->first('descripcion')}}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8 ">
                <input placeholder="PrecioProducto" type="text" id="precio" name="precio" value ="{{ old('precio')}}">
                <label for="precio">Precio del Producto</label>
                <span>{{$errors->first('precio')}}</span>
            </div>
        </div>
   
        <div class="row">
            <div class="col s8 input-field">
            <select name="marca" id="marca"> 
            <option value="">Elija la marca</option>                               
                @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach                            
            </select>
            <label for="marca">Marca</label>
            <span>{{$errors->first('marca')}}</span>
            </div>
        </div>
        
        <div class="row">
            <div class="col s8 input-field">
            <select name="categoria" id="categoria">  
            <option value="">Elija la categoria</option>                              
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria ->nombre}}</option>
                @endforeach                            
            </select>
            <label for="categoria">Categoria</label>
            <span>{{$errors->first('categoria')}}</span>
            </div>
        </div>
        
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn purple lighten-3 col s3">
                    <span>imagen...</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <span>{{$errors->first('imagen')}}</span>
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