<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
   
    public function view(User $user, Product $product): bool
    {
        return false;
    }

  
     public function viewAny(User $user)
     {
         return $user->hasAnyRole(['admin', 'customer']);
     }
     
     public function create(User $user)
     {
        return $user->hasAnyRole(['admin', 'customer']);
    }

    public function update(User $user, Product $product): bool
    {
        return false;
    }

    public function delete(User $user, Product $product): bool
    {
        return false;
    }

    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
