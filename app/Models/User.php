<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;
use App\Models\Admin\Event;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);

    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }


    public function hasRole($role)
    {
        return $this->roles->contains('title', $role);
    }

    public function hasPermission($permission)
    {
        return $this->roles->flatMap->permissions->pluck('title')->contains($permission);
    }
    
}