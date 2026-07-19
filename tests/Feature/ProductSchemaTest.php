<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductSchemaTest extends TestCase
{
    public function test_product_page_schema_contains_image(): void
    {
        $product = [
            'name'        => 'Omanawa Falls Creamed Honey',
            'rating'      => '5.0',
            'reviews'     => 42,
            'description' => 'A beautifully textured creamed honey.',
            'benefits'    => ['100% Raw'],
            'image'       => 'omanawa-falls',
            'options'     => [
                '950g' => ['price' => '25.00', 'price_cents' => 2500, 'weight' => '950g', 'sku' => 'oma_950'],
            ],
            'default_option' => '950g',
        ];

        $view = $this->view('product', [
            'product'       => $product,
            'slug'          => 'omanawa-falls-creamed-honey',
            'dbReviews'     => collect(),
            'reviewsCount'  => 0,
            'averageRating' => 0,
        ]);

        $view->assertSee('"image": "https://www.forestfairyhoney.co.nz/images/Omanawa-falls-creamed-honey.jpg"', false);
    }

    public function test_privacy_policy_page_returns_successful_response(): void
    {
        $response = $this->get('/privacy-policy');
        $response->assertStatus(200);
        $response->assertSee('Privacy Policy');
        $response->assertSee('Effective date:');
        $response->assertSee('20 July 2026');
        $response->assertSee('Benő Bodó');
    }

    public function test_sitemap_page_returns_successful_response(): void
    {
        $response = $this->get('/sitemap');
        $response->assertStatus(200);
        $response->assertSee('Sitemap');
        $response->assertSee('Omanawa Falls Creamed Honey');
        $response->assertSee('Mamaku Creamed Honey MGO 100+');
        $response->assertSee('Privacy Policy');
        $response->assertSee('Terms & Conditions');
        $response->assertSee('Blog: The Art of Gifting NZ Honey');
    }

    public function test_terms_conditions_page_returns_successful_response(): void
    {
        $response = $this->get('/terms-conditions');
        $response->assertStatus(200);
        $response->assertSee('Terms & Conditions');
        $response->assertSee('Effective date:');
        $response->assertSee('20 July 2026');
        $response->assertSee('Consumer Guarantees Act');
    }

    public function test_blog_hub_returns_successful_response(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('From the Hive');
        $response->assertSee('The Art of Gifting: Pure NZ Honey Collections');
    }

    public function test_blog_post_page_returns_successful_response(): void
    {
        $response = $this->get('/blog/the-art-of-gifting-nz-honey-collections');
        $response->assertStatus(200);
        $response->assertSee('The Art of Gifting:');
        $response->assertSee('Pure NZ Honey Collections');
        $response->assertSee('Omanawa Falls Creamed Honey');
    }
}
