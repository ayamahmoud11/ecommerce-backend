<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User model",
 *     required={"id","name","email"}
 * )
 * @OA\Property(property="id",   type="integer", format="int64")
 * @OA\Property(property="name", type="string")
 * @OA\Property(property="email",type="string", format="email")
 * @OA\Property(property="roles", type="array", 
 *     @OA\Items(type="string")
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function products()

{

return $this->hasMany(Product::class);

}

public function orders()

{

return $this->hasMany(Order::class);

}
}