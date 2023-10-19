<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_nacimiento', 'telefono', 'is_visible', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
