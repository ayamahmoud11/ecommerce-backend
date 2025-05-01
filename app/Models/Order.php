<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Order",
 *     type="object",
 *     title="Order model",
 *     required={"id","user_id","total_price","status"}
 * )
 * @OA\Property(property="id",          type="integer", format="int64", description="Order ID")
 * @OA\Property(property="user_id",     type="integer", description="ID of the user who placed the order")
 * @OA\Property(property="total_price", type="number",  format="float", description="Total price of the order")
 * @OA\Property(property="status",      type="string", description="Current status of the order")
 * @OA\Property(
 *     property="items",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/OrderItem")
 * )
 */
class Order extends Model

{

use HasFactory;

protected $fillable = [

'user_id',
'total_price',
'status',

];

public function user()

{

return $this->belongsTo(User::class);

}

public function items()

{

return $this->hasMany(OrderItem::class);

}

}