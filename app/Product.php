<?php

namespace App;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;

    protected $table = 'products';

    protected $fillable = ['code','name','price','status','description'];

    protected $fillter = ['code','name','status'];

    protected $casts = [
        'status' => 'boolean'
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;
}
