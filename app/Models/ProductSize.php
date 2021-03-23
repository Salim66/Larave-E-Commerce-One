<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sizes(){
        return $this -> belongsTo('App\Models\Size', 'size_id', 'id');
    }
}
