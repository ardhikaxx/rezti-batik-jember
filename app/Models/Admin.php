<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'nama_lengkap',
        'telepon',
        'jenis_kelamin',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}