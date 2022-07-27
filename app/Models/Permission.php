<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissons';

    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
