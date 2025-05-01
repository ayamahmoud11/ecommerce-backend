<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;

class ProductQuantityAvailable implements Rule
{
    protected $productIds;

    public function __construct($productIds)
    {
        $this->productIds = $productIds;
    }

    public function passes($attribute, $value)
    {
        $index = str_replace('items.', '', str_replace('.quantity', '', $attribute));
        $productId = $this->productIds[$index] ?? null;
        
        if (!$productId) {
            return false;
        }

        $product = Product::find($productId);
        
        if (!$product) {
            return false;
        }

        return $value <= $product->quantity;
    }

    public function message()
    {
        return 'The requested quantity is not available for one or more products.';
    }
}