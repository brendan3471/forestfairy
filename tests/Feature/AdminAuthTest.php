<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    public function test_unauthenticated_user_accessing_admin_panel_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin/orders');

        $response->assertRedirect('/admin/login');
    }

    public function test_route_login_redirects_to_admin_login(): void
    {
        $response = $this->get('/login');

        $response->assertRedirect(route('admin.login'));
    }
}
