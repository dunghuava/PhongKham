<?php

namespace App;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Filterable;

    protected $table = 'services';

    protected $fillable = ['name','price','status','description'];

    protected $fillter = ['name','status'];

    protected $casts = [
        'status' => 'boolean'
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;
}
