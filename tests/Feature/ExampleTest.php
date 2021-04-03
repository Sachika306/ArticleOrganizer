<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Artisan;

class ExampleTest extends TestCase
{
    
    public function setUp(): void
    {
        parent::setUp(); // If you define your own setUp method within a test class, be sure to call parent::setUp.
        $this->seed();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $request = $this->get('/');
        $request->assertOk();
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
    }


}
