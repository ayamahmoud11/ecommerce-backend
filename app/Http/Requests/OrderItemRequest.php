<?php

namespace App\Http\Requests;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="OrderItemRequest",
 *     type="object",
 *     title="Order Item Request",
 *     required={"product_id", "quantity"},
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="product des"
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Quantity"
 *     )
 * )
 */
class OrderItemRequest {}
