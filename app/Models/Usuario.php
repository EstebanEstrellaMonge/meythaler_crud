<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    protected $fillable = ['nombre', 'email', 'password', 'create_at', 'update_at'];

    protected $hidden = ['password'];

    public function casos()
    {
        return $this->hasMany(Caso::class);
    }
}
