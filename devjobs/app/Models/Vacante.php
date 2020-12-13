<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id',

    ];


    // Relacion 1: 1 categoria y vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    // Relacion 1: 1 salario y vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    // Relacion 1: 1 experiencia y vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    // Relacion 1: 1 ubicacion y vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }


    // Relacion 1: 1 reclutador y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}