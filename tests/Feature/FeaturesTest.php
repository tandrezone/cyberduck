<?php

namespace Tests\Feature;

use Tests\TestCase;

class FeaturesTest extends TestCase
{
    /**
     * Shouldn't enter in any section
     */
    public function testUnauthorized()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response = $this->get('/companies');
        $response->assertStatus(302);
        $response = $this->get('/employees');
        $response->assertStatus(302);
    }

    /**
     * Should be able to login
     */
    public function testLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * Shouldn't find register
     */
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);
    }

}
