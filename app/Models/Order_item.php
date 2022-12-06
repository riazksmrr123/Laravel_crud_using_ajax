<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['id', 'order_id', 'product_id', 'price', 'quantity', 'value'];
    use HasFactory;
}
