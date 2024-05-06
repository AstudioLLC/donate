<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrator extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'users';

    const ROLE = [
        0 => 'superadmin',
        1 => 'admin',
        2 => 'content',
        3 => 'moderator',
        4 => 'accountant',
        5 => 'systemadmin',
        6 => 'sponsor',
        7 => 'user'
    ];

    const ROLEFRONT = [
        0 => 'Главный Администратор',
        1 => 'Администратор',
        2 => 'Контент менеджер',
        3 => 'Модератор',
        4 => 'Бухгалтер',
        5 => 'Системный администратор',
        6 => 'Спонсор',
        7 => 'Пользователь'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'phone',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    public function getRoleText($role)
    {
        return __('app.Role.' . $role);
    }
}
