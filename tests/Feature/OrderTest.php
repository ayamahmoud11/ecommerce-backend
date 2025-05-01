<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $customer;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\RoleSeeder::class);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $this->customer = User::factory()->create();
        $this->customer->assignRole('customer');

        $this->product = Product::factory()->create([
            'user_id' => $this->admin->id,
            'quantity' => 10,
            'price' => 5.99,
        ]);
    }
public function test_allows_customers_to_create_orders()
{
    Sanctum::actingAs($this->customer);

    $product = Product::factory()->create([
        'quantity' => 10, 
        'price' => 5.99
    ]);

    $response = $this->postJson('/api/orders', [
        'items' => [
            [
                'product_id' => $product->id,
                'quantity' => 2  
            ]
        ]
    ]);

    $response->assertStatus(201);
}
    public function test_prevents_ordering_more_than_available_quantity()
    {
        Sanctum::actingAs($this->customer);

        $response = $this->postJson('/api/orders', [
            'items' => [
                [
                    'product_id' => $this->product->id,
                    'quantity' => 15,
                ]
            ]
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['items.0.quantity']);
    }

    public function test_shows_only_own_orders_to_customers()
    {
        Order::factory()->create(['user_id' => $this->admin->id]);
        Order::factory()->create(['user_id' => $this->customer->id]);

        Sanctum::actingAs($this->customer);

        $response = $this->getJson('/api/orders');

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_allows_admin_to_see_all_orders()
    {
        Order::factory()->create(['user_id' => $this->admin->id]);
        Order::factory()->create(['user_id' => $this->customer->id]);

        Sanctum::actingAs($this->admin);

        $response = $this->getJson('/api/orders');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
}
