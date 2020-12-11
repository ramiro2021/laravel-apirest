@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
@include('ui.adminnav')
@endsection


@section('content')
<h1 class="text-2xl text-center mt-10">Nueva Vacante </h1>

<form class="max-w-lg mx-auto my-10" action="">
    <div class="mb-5">
        <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante</label>
        <input id="titulo" type="text" class="p-3 bg-white-100 rounded form-input w-full @error('titulo') border-red-500 border @enderror" name="titulo" value="{{ old('titulo') }}"  autocomplete="titulo" autofocus>
    </div>

    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria</label>
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
        <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia</label>
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

    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion</label>
        <select class="block
        appearance-none border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 p-3 bg-white-100 w-full"
        name="ubicacion" id="ubicacion">
        <option disabled selected value="">- Selecciona -</option>
        @foreach($ubicaciones as $ubicacion)
        <option value="{{ $ubicacion->id }} ">
        {{ $ubicacion->nombre }}
        </option>
        @endforeach
    </select>
    </div>

      <div class="mb-5">
        <label for="salario" class="block text-gray-700 text-sm mb-2">Salario</label>
        <select class="block
        appearance-none border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 p-3 bg-white-100 w-full"
        name="salario" id="salario">
        <option disabled selected value="">- Selecciona -</option>
        @foreach($salarios as $salario)
        <option value="{{ $salario->id }} ">
        {{ $salario->nombre }}
        </option>
        @endforeach
    </select>
    </div>

    <div class="mb-5">
        <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del puesto</label>
        <div class="editable pd-3  bg-white rounded form-input w-full text-gray-700"></div>
        <input type="hidden" name="descripcion" id="descripcion">
    </div>

    <div class="mb-5">
        <label for="imagen" class="block text-gray-700 text-sm mb-2">Imagen Vacante</label>
        <div  id="dropzoneDevJobs" class="dropzone rounded bg-white"></div>

        <input type="hidden" name="imagen" id="imagen">

        <p id="error"></p>
    </div>


    <div class="mb-5">
        <label for="skills" class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos</label>
       @php
           $skills = ['HTML5','CCS3','CSSGrid','Flexbox','JavaScript','jQuery','Node','Angular','VueJS','ReactJS','React Hooks','Redux','Apollo','GraphQL','Typescript','PHP','Laravel','SQL','MongoDB','Firebase', ]
       @endphp
        <lista-skills
    :skills="{{ json_encode($skills) }}"
        ></lista-skills>
    </div>

   <button type="submit" class="my-10 bg-blue-500 w-full hover:bg-blue-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Crear</button>

</form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
<script>
// Dropzone
    Dropzone.autoDiscover = false;

    document.addEventListener('DOMContentLoaded', ()=>{
        const editor = new MediumEditor('.editable', {
            toolbar:{
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft','justifyRight', 'justifyFull', 'orderList', 'unordered', 'h2', 'h3'],
                static:true,
                sticky:true
            },
            placeholder:{
                text: 'Informacion de la Vacante'
            }
        });
        editor.subscribe('editableInput', function(eventObj,editable){
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        });

        const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
            url: "/vacantes/imagen",
            dictDefaultMessage: 'Sube aqui tu archivo',
            acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
            addRemoveLinks:true,
            dictRemoveFile: 'Borrar Archivo',
            maxFiles: 1,
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            success: function(file, response){
                // seteo el mensaje de error en vacio
                document.querySelector('#error').textContent = '';
                // respuesta del sv en input hidden
                document.querySelector('#imagen').value = response.correcto;

                // añadir al objeto de archivo el nombre del sv
                file.nombreServidor = response.correcto;

            },
            maxfilesexceeded: function(file){
                document.querySelector('#error').textContent = 'Son demasiados archivos';
                if (this.files[1] != null) {
                    this.removeFile(this.files[0]);
                    this.addFile(file);
                }
            },
            removedfile: function(file,response){
                // eliminar de la vista
               file.previewElement.parentNode.removeChild(file.previewElement);

                params = {
                    imagen: file.nombreServidor
                }

                axios.post('/vacantes/borrarimagen', params)
                            .then((respuesta) => {
                                console.log(respuesta);
                            });
            }

        });
    });
</script>

@endsection
