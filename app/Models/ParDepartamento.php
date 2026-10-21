<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParDepartamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ParDepartamentos';

    protected $fillable = [
        'nombre',
        'extension',
        'pais_id',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    /**
     * Relación: un departamento pertenece a un país.
     */
    public function pais()
    {
        return $this->belongsTo(ParPais::class, 'pais_id');
    }
}