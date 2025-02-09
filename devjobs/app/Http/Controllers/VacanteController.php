<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vacantes = auth()->user()->vacantes;

        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->simplePaginate(10);

        return View('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return View('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required|min:6'

        ]);

        //Almacenar en la BD
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'skills' => $data['skills'],
        ]);

        return redirect()->action([VacanteController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {

        // if ($vacante->activa === 0) return abort(404);
        return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        // policy para verificar que solo el usuario q creo la vacante pueda ver el edit
        $this->authorize('view', $vacante);

        // consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();


        return view('vacantes.edit', compact('vacante', 'categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {

        // policy para verificar que solo el usuario q creo la vacante pueda editar
        $this->authorize('update', $vacante);

        $data = $request->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required|min:6'

        ]);

        $vacante->titulo = $data['titulo'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->imagen = $data['imagen'];
        $vacante->skills = $data['skills'];

        $vacante->save();

        return redirect()->action([VacanteController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        // policy para verificar que solo el usuario q creo la vacante pueda eliminar
        $this->authorize('delete', $vacante);

        $vacante->delete();
        return response()->json(['mensaje' => 'Se elimino la vacante ' . $vacante->titulo]);
    }


    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request)
    {
        if ($request->ajax()) {
            $imagen =  $request->get('imagen');
            if (File::exists('storage/vacantes/' . $imagen)) {

                File::delete('storage/vacantes/' . $imagen);
            }


            return response('Imagen Eliminada', 200);
        }
    }

    public function estado(Request $request, Vacante $vacante)
    {
        //Lerr nuevo estado y asignarlo
        $vacante->activa = $request->estado;

        // guardarlo en la BD
        $vacante->save();

        return response()->json(['respuesta' => 'Correcto']);
    }

    public function buscar(Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required',
        ]);

        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        // TRAER CON AND

        // $vacantes = Vacante::latest()
        //     ->where('categoria_id', $categoria)
        //     ->where('ubicacion_id', $ubicacion)
        //     ->get();

        $vacantes = Vacante::where([
            'categoria_id' => $categoria,
            'ubicacion_id' => $ubicacion
        ])->get();

        // TRAER CON OR

        // $vacantes = Vacante::latest()
        //     ->where('categoria_id', $categoria)
        //     ->orWhere('ubicacion_id', $ubicacion)
        //     ->get();


        return view('buscar.index', compact('vacantes'));
    }

    public function resultado()
    {
        return 'mostrando resultados';
    }
}