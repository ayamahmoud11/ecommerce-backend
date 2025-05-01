<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="OrderItem",
 *     type="object",
 *     title="OrderItem model",
 *     required={"id","order_id","product_id","quantity","unit_price"}
 * )
 * @OA\Property(property="id",          type="integer", format="int64")
 * @OA\Property(property="order_id",    type="integer")
 * @OA\Property(property="product_id",  type="integer")
 * @OA\Property(property="quantity",    type="integer")
 * @OA\Property(property="unit_price",  type="number", format="float")
 */
class OrderItem extends Model

{

use HasFactory;

protected $fillable = [
    'order_id',
    'product_id',
    'quantity',
    'unit_price', 
];
public function order()

{

return $this->belongsTo(Order::class);

}

public function product()

{

return $this->belongsTo(Product::class);

}

}