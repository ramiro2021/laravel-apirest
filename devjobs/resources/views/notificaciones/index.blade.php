@extends('layouts.app')


@section('navegacion')
    @include('ui.adminnav')
@endsection


@section('content')
    <h1 class="text-2xl text-center mt-10">Notificaciones Pendientes</h1>

    @if(count($notificaciones)>0)

    <ul class="max-w-md mx-auto mt-10 text-center">

        @foreach($notificaciones as $notificacion)
            @php
                $data=$notificacion->data
            @endphp
          <li class="p-5 border border-gray-400 mb-5 hover:bg-blue-500 hover:text-white">
            <p class="mb-4">
                 Tienes un nuevo candidato en : <br> <span class="font-bold">{{ $data['vacante'] }}</span>
            </p>
           <a href="{{ route('candidatos.index', ['id'=> $data['id_vacante']] ) }}">
            Ver candidatos
            </a>
          </li>

        @endforeach
    </ul>

    @else
        <p class="text-center mt-5">No hay notificaciones</p>
    @endif

    <h1 class="text-2xl text-center mt-10">Todas las notificaciones</h1>

    @if(count($notificacionesAll)>0)

    <ul class="max-w-md mx-auto mt-10 text-center">

        @foreach($notificacionesAll as $notificacion)
            @php
                $data=$notificacion->data
            @endphp
          <li class="p-5 border border-gray-400 mb-5 hover:bg-blue-500 hover:text-white">
            <p class="mb-4">
                 Tienes un nuevo candidato en : <br> <span class="font-bold">{{ $data['vacante'] }}</span>
            </p>
            <p class="mb-4">
                Te escribio hace : <br> <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
           </p>

            <a class="bg-blue-300 text-black hover:bg-blue-800 p-3 inline-block text-xs font-bold uppercase hover:text-white" href="{{ route('candidatos.index', ['id'=> $data['id_vacante']] ) }}">
                Ver candidatos
                </a>
          </li>

        @endforeach
    </ul>


        {{ $notificacionesAll->links() }}


    @else
        <p class="text-center mt-5">No hay notificaciones</p>
    @endif

@endsection
