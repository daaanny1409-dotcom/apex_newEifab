<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcaCursoTurno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'AcaCursoTurnos';

    protected $fillable = [
        'descripcion',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'hora_inicio',
        'hora_fin',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'lunes' => 'boolean',
            'martes' => 'boolean',
            'miercoles' => 'boolean',
            'jueves' => 'boolean',
            'viernes' => 'boolean',
            'sabado' => 'boolean',
            'domingo' => 'boolean',
            'activo' => 'boolean',
        ];
    }

    /**
     * Accessor: días en formato corto (L-M-M-J-V)
     */
    public function getDiasAttribute(): string
    {
        $dias = [];
        if ($this->lunes) $dias[] = 'Lun';
        if ($this->martes) $dias[] = 'Mar';
        if ($this->miercoles) $dias[] = 'Mié';
        if ($this->jueves) $dias[] = 'Jue';
        if ($this->viernes) $dias[] = 'Vie';
        if ($this->sabado) $dias[] = 'Sáb';
        if ($this->domingo) $dias[] = 'Dom';
        
        return implode(' - ', $dias) ?: 'Sin días';
    }
}