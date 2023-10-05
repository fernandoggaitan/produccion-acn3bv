<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_nacimiento', 'telefono', 'is_visible', 'categoria_id'];

}
