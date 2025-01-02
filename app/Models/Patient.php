<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 *
 * @property $id
 * @property $usuario_id
 * @property $fecha_nacimiento
 * @property $genero
 * @property $direccion
 * @property $telefono
 * @property $tutor_nombre
 * @property $tutor_relacion
 * @property $tutor_telefono
 * @property $historial_medico
 * @property $alergias
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuario_id', 'fecha_nacimiento', 'genero', 'direccion', 'telefono', 'tutor_nombre', 'tutor_relacion', 'tutor_telefono', 'historial_medico', 'alergias'];

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
