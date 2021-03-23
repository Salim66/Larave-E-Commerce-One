<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function color(){
        return $this->belongsTo('App\Models\Color', 'color_id', 'id');
    }

    public function size(){
        return $this->belongsTo('App\Models\Size', 'size_id', 'id');
    }
}
