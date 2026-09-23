<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoginPage()
    {
        $response = $this->get('/users/login');

        $response->assertStatus(200);
    }

    public function testAdminDashboard()
    {
        $admin = \App\Models\User::where('user_type', 'admin')->first();
        if ($admin) {
            $response = $this->actingAs($admin)->get('/admin');
            $response->assertStatus(200);
        } else {
            $this->markTestSkipped('No admin user found');
        }
    }

    public function testCartPage()
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }

    public function testSearchPage()
    {
        $response = $this->get('/search');
        $response->assertStatus(200);
    }

    public function testApiCategories()
    {
        $response = $this->getJson('/api/v2/categories');
        $response->assertStatus(200);
    }

    public function testPosOrderForWalkInCustomerWithoutShippingAddress()
    {
        $admin = \App\Models\User::where('user_type', 'admin')->first();
        $stock = \App\Models\ProductStock::where('qty', '>', 5)->first();

        if (!$admin || !$stock) {
            $this->markTestSkipped('No admin or product stock available.');
        }

        $cart = [
            [
                'stock_id' => $stock->id,
                'id'       => $stock->product_id,
                'variant'  => $stock->variant ?? '',
                'quantity' => 1,
                'price'    => $stock->price,
                'tax'      => 0,
            ]
        ];

        // Ensure no shipping info is in session (walk-in customer)
        $response = $this->actingAs($admin)
            ->withSession(['pos.cart' => $cart])
            ->post('/pos-order', [
                'user_id'      => null,
                'payment_type' => 'cash',
            ]);

        $response->assertStatus(200);
        $data = $response->json();
        $this->assertEquals(1, $data['success']);
    }

    public function testPosOrderWithOptionalShippingInfo()
    {
        $admin = \App\Models\User::where('user_type', 'admin')->first();
        $stock = \App\Models\ProductStock::where('qty', '>', 5)->first();

        if (!$admin || !$stock) {
            $this->markTestSkipped('No admin or product stock available.');
        }

        $cart = [
            [
                'stock_id' => $stock->id,
                'id'       => $stock->product_id,
                'variant'  => $stock->variant ?? '',
                'quantity' => 1,
                'price'    => $stock->price,
                'tax'      => 0,
            ]
        ];

        $shippingInfo = [
            'name'        => 'John Doe',
            'email'       => 'johndoe@example.com',
            'phone'       => '01700000000',
            'address'     => '123 Main Street',
            'country'     => 'Bangladesh',
            'state'       => 'Dhaka',
            'city'        => 'Dhaka',
            'postal_code' => '1200',
        ];

        $response = $this->actingAs($admin)
            ->withSession([
                'pos.cart'          => $cart,
                'pos.shipping_info' => $shippingInfo,
            ])
            ->post('/pos-order', [
                'user_id'      => null,
                'payment_type' => 'cash',
            ]);

        $response->assertStatus(200);
        $data = $response->json();
        $this->assertEquals(1, $data['success']);

        $order = \App\Models\Order::latest('id')->first();
        $savedAddress = json_decode($order->shipping_address, true);
        $this->assertEquals('John Doe', $savedAddress['name']);
        $this->assertEquals('123 Main Street', $savedAddress['address']);
    }
}
