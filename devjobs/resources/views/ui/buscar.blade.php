<h2 class="my-10 text-2xl text-center text-gray-700">Busca una vacante</h2>
<form action="{{ route('vacantes.buscar') }}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria</label>
        <select class="block
        appearance-none border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none
        focus:bg-white focus:border-gray-500 p-3 bg-white-100 w-full"
        name="categoria" id="categoria">
        <option disabled selected value="">- Selecciona -</option>
        @foreach($categorias as $categoria)
        <option
        {{ old('categoria') == $categoria->id ? 'selected' : '' }}
        value="{{ $categoria->id }} ">
        {{ $categoria->nombre }}
        </option>
        @endforeach
    </select>
    @error('categoria')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
        <strong class="font-bold">
            Error!
        </strong>
        <span class="block">
            {{ $message }}
        </span>
    </div>
    @enderror
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
        <option
        {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
        value="{{ $ubicacion->id }} ">
        {{ $ubicacion->nombre }}
        </option>
        @endforeach
    </select>

    @error('ubicacion')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
        <strong class="font-bold">
            Error!
        </strong>
        <span class="block">
            {{ $message }}
        </span>
    </div>
    @enderror
    </div>
    <button type="submit" class="bg-blue-500 w-full hover:bg-blue-800 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10">
        Buscar Vacantes
    </button>
</form>
