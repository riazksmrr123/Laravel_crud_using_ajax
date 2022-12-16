<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table='products';
    protected $fillable=['name','price','sale_price','description','sku','product_image'];
    
    use HasFactory;

    //relation with order_items

        // public function product()
        // {
        //     return $this->belongsTo(Order_item::class, 'product_id');
        // }

}
