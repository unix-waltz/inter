<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];
    public function orderUser(){
        return $this->belongsTo(User::class,'id');
    }
    public function orderProduct(){
        return $this->belongsTo(ProductModel::class,'id');
    }
}
