<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ProductStock;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockAndWholesaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_wholesale_page_renders_successfully(): void
    {
        $response = $this->get('/wholesale');
        $response->assertStatus(200);
        $response->assertSee('Wholesale New Zealand Honey');
    }

    public function test_return_policy_page_renders_successfully(): void
    {
        $response = $this->get('/return-policy');
        $response->assertStatus(200);
        $response->assertSee('Refund &amp; Damaged', false);
    }

    public function test_wholesale_inquiry_submission(): void
    {
        $response = $this->post('/wholesale', [
            'business_name' => 'Aotearoa Honey Goods',
            'contact_name'  => 'John Doe',
            'email'         => 'john@example.com',
            'phone'         => '021999888',
            'estimated_qty' => '25-50 jars',
            'notes'         => 'Interested in Mamaku creamed honey.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('wholesale_success');
    }

    public function test_admin_can_view_and_update_stock(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin/stock');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->post('/admin/stock', [
            'stocks' => [
                'oma_950' => 4,
                'mam_500' => 0,
            ],
        ]);

        $response->assertRedirect();
        $this->assertEquals(4, ProductStock::getStockForSku('oma_950'));
        $this->assertEquals(0, ProductStock::getStockForSku('mam_500'));
    }

    public function test_cart_prevents_adding_more_than_max_or_available_stock(): void
    {
        ProductStock::ensureSeeded();
        ProductStock::where('sku', 'oma_950')->update(['stock' => 5]);

        // Attempt to add 8 when stock is 5
        $response = $this->post('/cart/add/omanawa-falls-creamed-honey', [
            'option'   => '950g',
            'quantity' => 8,
        ]);

        $response->assertSessionHas('cart_error');
    }

    public function test_stock_decrement_helper(): void
    {
        ProductStock::ensureSeeded();
        ProductStock::where('sku', 'rew_950')->update(['stock' => 20]);

        $decremented = ProductStock::decrementStock('rew_950', 3);
        $this->assertTrue($decremented);
        $this->assertEquals(17, ProductStock::getStockForSku('rew_950'));
    }
}
