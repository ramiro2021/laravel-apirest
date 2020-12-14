@extends('layouts.app')

@section('navegacion')
@include('ui.categoriasnav')
@endsection


@section('content')

<div class="my-10 bg-gray-100 p-10 shadow">


    @if(count($vacantes)> 0)

    @include('ui.listadovacantes')
    @else
    <p class="text-center my-10 mx-5 ">No hay vacantes disponibles para la busqueda</p>
    @endif
</div>

@endsection
