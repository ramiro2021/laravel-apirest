@extends('layouts.app')


@section('botones')

<a class="btn btn-primary mr-2 text-white" href="{{route('recetas.create')}}"> Nueva Receta</a>

@endsection



@section('content')

<h2 class="text-center mb-5">Administra tus recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">
                    Titulo
                </th>
                <th scole="col">
                    Categoria
                </th>
                <th scole="col">
                    Acciones
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Pizzas</td>
                <td>Pizzas</td>
                <td>
                    <button class="btn">ver mas..</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>



@endsection

