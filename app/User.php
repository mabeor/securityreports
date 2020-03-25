<?php

namespace App;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //linea agregada para deshabilitar la evaluacion del token
    // protected $rememberTokenName = false;l token

    protected $fillable = [
        'name', 'password','username'/*,'email'*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', /*'remember_token',*/
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    //  */
    // protected $casts = [ //se elimino el fampo email_verified_at asi que se comenta este metodo
    //     'email_verified_at' => 'datetime',
    // ];

    //estableciendo la relacion many-to-many entre los modelos User y Role
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    //Los siguientes 3 metodos validaran que rol posee el usuario
    public function authorizeRoles($roles){
        abort_unless($this->hasAnyRole($roles), 403,'No estas autorizado para ingresar aqui');
        return true;
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
