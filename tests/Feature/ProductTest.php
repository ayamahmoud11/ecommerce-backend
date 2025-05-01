<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use \Database\Seeders\RoleSeeder;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);

        $this->admin = User::factory()->create();
        $this->admin->syncRoles('admin');
        $this->customer = User::factory()->create();
        $this->customer->syncRoles('customer');
    }
    public function test_allows_admin_to_create_products()
    {
        Sanctum::actingAs($this->admin);

        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 9.99,
            'quantity' => 10,
        ]);

        $response->assertStatus(201);
    }

    public function test_prevents_customers_from_creating_products()
    {
        Sanctum::actingAs($this->customer);

        $response = $this->postJson('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 9.99,
            'quantity' => 10,
        ]);

        $response->assertStatus(403);
    }

    public function test_shows_only_own_products_to_customers()
    {
        Product::factory()->create(['user_id' => $this->admin->id]);
        Product::factory()->create(['user_id' => $this->customer->id]);

        Sanctum::actingAs($this->customer);

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_allows_admin_to_see_all_products()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        Product::factory()->create(['user_id' => $user1->id]);
        Product::factory()->create(['user_id' => $user2->id]);

        Sanctum::actingAs($this->admin);

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
}
