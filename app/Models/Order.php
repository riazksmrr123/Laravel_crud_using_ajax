<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['id','customer_id','order_date','sub_total','tax_percentage','tax_amount','order_total'];
    use HasFactory;
}
