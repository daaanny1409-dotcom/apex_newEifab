<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nombre de la tabla en la BD.
     */
    protected $table = 'users';

    /**
     * Llave primaria personalizada.
     */
    protected $primaryKey = 'idUsuario';

    /**
     * Atributos asignables en masa.
     */
    protected $fillable = [
        'idPersona',
        'login',
        'password',
        'idEmpresa',
        'idGrupo',
        'baja',
        'usuario',
        'fechaModificacion',
        'fechaCreacion',
        'email',
        'name',
    ];

    /**
     * Atributos ocultos en serialización.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de tipos.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'fechaModificacion' => 'datetime',
            'fechaCreacion' => 'datetime',
        ];
    }
}