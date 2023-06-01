<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Validation\Rules\Password;

/**
 * App\Models\Usuario
 *
 * @property int $usuario_id
 * @property int $rol_id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Rol $rol
 * @property int|null $suscripcion_activa
 * @property string $fecha_nacimiento
 * @property-read \App\Models\Suscripcion|null $suscripcion
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereSuscripcionActiva($value)
 */
class Usuario extends User
{
//    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = "usuario_id";

    protected $fillable = ['nombre', 'apellido', 'email', 'password', 'rol_id', 'fecha_nacimiento'];
    protected $hidden = ['password', 'remember_token'];

    public const VALIDATE_RULES_LOGIN = [
        'email' => 'required|email',
        'password' => [
            'required',
        ],
    ];

    public const VALIDATE_MESSAGES_LOGIN = [
        'email.required' => 'Debes introducir un email para iniciar sesión.',
        'email.email' => 'Debes introducir un formato de email válido',
        'password.required' => 'Debes introducir una contraseña para iniciar sesión',
        'nombre.required' => 'Debes ingresar un nombre para registrarte',
        'apellido.required' => 'Debes ingresar un apellido para registrarte',
    ];

    public const VALIDATE_RULES_REGISTER = [
        'email' => 'required|email',
        'password' => [
            'required',
            'min:8',
        ],
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required'
    ];

    public const VALIDATE_MESSAGES_REGISTER = [
        'email.required' => 'Debes introducir un email para registrarte.',
        'email.email' => 'Debes introducir un formato de email válido',
        'password.required' => 'Debes introducir una contraseña para registrarte',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'nombre.required' => 'Debes ingresar un nombre para registrarte',
        'apellido.required' => 'Debes ingresar un apellido para registrarte',
        'fecha_nacimiento.required' => 'La fecha de nacimiento no puede quedar vacía'
    ];

    public function rol() {
        return $this->belongsTo(
            Rol::class,
            'rol_id',
            'rol_id',
        );
    }

//    public function suscripcion() {
//        return $this->belongsTo(
//            Suscripcion::class,
//            'suscripcion_activa',
//            'suscripcion_id',
//        );
//    }
}
