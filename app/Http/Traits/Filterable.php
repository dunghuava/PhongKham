<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    public $specialCols = ['code', 'name'];

    public function scopeFillter(Builder $builder, Request $request)
    {
        foreach ($this->fillter as $colname) {
            if ($request->has($colname) && !is_null($request->get($colname)) && !empty($request->get($colname))) {
                if (in_array($colname, $this->specialCols)) {
                    $builder->where($colname, 'like', '%' . $request->get($colname) . '%');
                } else {
                    $builder->where($colname, $request->get($colname));
                }
            }
        }
    }
}
