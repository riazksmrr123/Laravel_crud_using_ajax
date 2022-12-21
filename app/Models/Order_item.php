<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['id', 'order_id', 'product_id', 'price', 'quantity', 'value'];
    protected $casts=[
        //'order_id' => 'array',
        'product_id' => 'array',
        'price' => 'array',
        'quantity' => 'array',
        'value' => 'array'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    use HasFactory;
}
