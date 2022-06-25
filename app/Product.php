<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $appends = ['status_label'];

    protected function getStatusLabelAttribute(){
        if($this->status){
            return 'Bật';
        }
        return 'Tắt';
    }
}
