@extends('layouts.app')

@section('navegacion')
@include('ui.adminnav')
@endsection


@section('content')
<h1 class="text-2xl text-center mt-10">Nueva Vacante </h1>

<form class="max-w-lg mx-auto my-10" action="">
    <div class="mb-5">
        <label for="titulo" class="block text-gray-700 text-sm mb-2"> Titulo Vacante</label>
        <input id="titulo" type="text" class="p-3 bg-white-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror" name="titulo" value="{{ old('titulo') }}"  autocomplete="titulo" autofocus>
    </div>

    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2"> Categoria</label>
        <select class="block
        appearance-none border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 p-3 bg-white-100 w-full"
        name="categoria" id="categoria">
        <option disabled selected value="">- Selecciona -</option>
        @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }} ">
        {{ $categoria->nombre }}
        </option>
        @endforeach
    </select>
    </div>

    <div class="mb-5">
        <label for="experiencia" class="block text-gray-700 text-sm mb-2"> Experiencia</label>
        <select class="block
        appearance-none border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 p-3 bg-white-100 w-full"
        name="experiencia" id="experiencia">
        <option disabled selected value="">- Selecciona -</option>
        @foreach($experiencias as $experiencia)
        <option value="{{ $experiencia->id }} ">
        {{ $experiencia->nombre }}
        </option>
        @endforeach
    </select>
    </div>

   <button type="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Crear</button>

</form>
@endsection
