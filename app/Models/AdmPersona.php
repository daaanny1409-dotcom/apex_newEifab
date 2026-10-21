<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmPersona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'AdmPersonas';

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'sexo',
        'fecha_nacimiento',
        'nro_documento',
        'email',
        'telefono',
        'direccion',
        'foto',
        'tipo_persona',
        'municipio_id',
        'departamento_id',
        'pais_id',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'activo' => 'boolean',
        ];
    }

    // Relaciones
    public function pais()
    {
        return $this->belongsTo(ParPais::class, 'pais_id');
    }

    public function departamento()
    {
        return $this->belongsTo(ParDepartamento::class, 'departamento_id');
    }

    public function municipio()
    {
        return $this->belongsTo(ParMunicipio::class, 'municipio_id');
    }

    // Accessors
    public function getNombreCompletoAttribute(): string
    {
        return trim("{$this->nombre} {$this->paterno} {$this->materno}");
    }

    // Scopes
    public function scopeEstudiantes($query)
    {
        return $query->where('tipo_persona', 'estudiante');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}