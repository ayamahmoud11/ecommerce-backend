<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"id","name","price","quantity"}
 * )
 * @OA\Property(property="id",       type="integer")
 * @OA\Property(property="name",     type="string")
 * @OA\Property(property="description", type="string")
 * @OA\Property(property="price",    type="number", format="float")
 * @OA\Property(property="quantity", type="integer")
 * @OA\Property(property="user_id",  type="integer")
 */

class Product extends Model

{

use HasFactory;

protected $fillable = [

'user_id',

'name',

'description',

'price',

'quantity',

];

public function user()

{

return $this->belongsTo(User::class);

}

public function orderItems()

{

return $this->hasMany(OrderItem::class);

}

}