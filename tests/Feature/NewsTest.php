<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCatalogAvailable()
    {
        $response = $this->get('/catalog');

        $response->assertStatus(200);
    }

    public function testNewsAvailable()
    {
        $response = $this->get('/catalog/news');

        $response->assertStatus(200);
    }
    public function testFormsOrderAvailable()
    {
        $response = $this->get('/order');

        $response->assertStatus(200);
    }
    public function testFormsFeedbackAvailable()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);

    }
}
