<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     schema="StoreProductRequest",
 *     type="object",
 *     title="StoreProductRequest",
 *     required={"name","price","quantity"}
 * )
 * @OA\Property(property="name",        type="string",  description="Product name")
 * @OA\Property(property="description", type="string",  description="Product description")
 * @OA\Property(property="price",       type="number",  format="float", description="Product price")
 * @OA\Property(property="quantity",    type="integer", description="Available quantity")
 */
class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ];
    }
}