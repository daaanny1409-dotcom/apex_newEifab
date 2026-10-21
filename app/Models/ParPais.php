<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParPais extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ParPaises';

    protected $fillable = [
        'nombre',
        'codigo',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    /**
     * Relación: un país tiene muchos departamentos.
     */
    public function departamentos()
    {
        return $this->hasMany(ParDepartamento::class, 'pais_id');
    }
}