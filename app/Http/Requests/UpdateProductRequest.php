<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="UpdateProductRequest",
 *     type="object",
 *     title="UpdateProductRequest",
 *     required={"name","price","quantity"}
 * )
 * @OA\Property(property="name",        type="string",  description="Product name")
 * @OA\Property(property="description", type="string",  description="Product description")
 * @OA\Property(property="price",       type="number",  format="float", description="Product price")
 * @OA\Property(property="quantity",    type="integer", description="Available quantity")
 */
class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'quantity' => 'sometimes|integer|min:0',
        ];
    }
}