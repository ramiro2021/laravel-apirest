@extends('layouts.app')

@section('navegacion')
@include('ui.categoriasnav')
@endsection


@section('content')

<div class="my-10 bg-gray-100 p-10 shadow">
    <h1 class="text-3xl text-gray-600 m-0">Categoria <span class="font-bold">{{ $categoria->nombre }}</span></h1>

    @if(count($vacantes)> 0)

    @include('ui.listadovacantes')
    @else
    <p class="text-center my-10 mx-5 ">No hay vacantes disponibles para la categoria : <span class="font-bold">{{ $categoria->nombre }}</span></p>
    @endif
</div>

@endsection
