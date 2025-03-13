<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Project
 *
 * Representa la tabla 'projects' en la base de datos.
 *
 * @property int $project_id Identificador único del proyecto (clave primaria).
 * @property string $title Nombre del proyecto. // <-- CAMBIADO a 'title'
 * @property string|null $description Descripción del proyecto.
 * @property \Carbon\Carbon|null $start_date Fecha de inicio del proyecto.
 * @property \Carbon\Carbon|null $end_date Fecha de finalización planificada del proyecto.
 * @property string $status Estado actual del proyecto (ej: 'planning', 'in_progress', 'on_hold', 'completed', 'cancelled').
 * @property int $owner_id Identificador del usuario que es el propietario del proyecto (clave foránea a 'users').
 * @property \Carbon\Carbon|null $created_at Fecha de creación del registro.
 * @property \Carbon\Carbon|null $updated_at Fecha de última actualización del registro.
 *
 * @property \App\Models\User $owner Usuario propietario del proyecto.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks Tareas asociadas al proyecto.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments Comentarios asociados al proyecto.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files Archivos asociados al proyecto.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $members Miembros (usuarios) del proyecto.
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Nombre de la clave primaria personalizada.
     *
     * @var string
     */
    protected $primaryKey = 'project_id';

    /**
     * Atributos que son asignables masivamente.  Usamos 'title' en lugar de 'name' para coincidir con la base de datos. // <-- CAMBIADO a 'title'
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', // Usamos 'title' aquí // <-- CAMBIADO a 'title'
        'description',
        'start_date',
        'end_date',
        'status',
        'owner_id'
    ];

    /**
     * The attributes that should be cast.  <- ¡AÑADE ESTO! (¡IMPORTANTE para las fechas!)
     *
     * @var array
     */
    protected $casts = [ //  <- ¡ASEGÚRATE DE QUE ESTO ESTÉ AQUÍ para solucionar el error de fechas!
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];


    /**
     * Define la relación con el modelo Task (Tareas del proyecto).
     *
     * Un Proyecto tiene muchas Tareas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'project_id');
    }

    /**
     * Define la relación con el modelo Comment (Comentarios del proyecto).
     *
     * Un Proyecto tiene muchos Comentarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'project_id', 'project_id');
    }

    /**
     * Define la relación con el modelo File (Archivos del proyecto).
     *
     * Un Proyecto tiene muchos Archivos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'project_id', 'project_id');
    }

    /**
     * Define la relación muchos-a-muchos con el modelo User (Miembros del proyecto).
     *
     * Un Proyecto tiene muchos Miembros (Usuarios) y viceversa, a través de la tabla pivote 'memberships'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'memberships', 'project_id', 'user_id')
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps();
    }


    /**
     * Define la relación con el modelo User (Propietario del proyecto).
     *
     * Un Proyecto pertenece a un Usuario (Owner).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'user_id');
    }
}