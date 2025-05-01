<?php

namespace App\Http\Requests;

use App\Rules\ProductQuantityAvailable;
use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="StoreOrderRequest",
 *     type="object",
 *     title="StoreOrderRequest",
 *     required={"items"}
 * )
 * @OA\Property(
 *     property="items",
 *     type="array",
 *     description="List of order items",
 *     @OA\Items(ref="#/components/schemas/OrderItemRequest")
 * )
 */
class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
                new ProductQuantityAvailable($this->input('items.*.product_id')),
            ],
        ];
    }
}