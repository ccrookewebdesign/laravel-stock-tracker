<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use RetailerWithProductSeeder;
use Tests\TestCase;

class TrackCommandTest extends TestCase {

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItTracksProductStock(){

        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->inStock());

        Http::fake(function() { return ['onlineAvailability' => true, 'salePrice' => 1200]; });

        $this->artisan('track')->expectsOutput('Completed.');

        $this->assertTrue(Product::first()->inStock());
    }

    public function testItNotifiesUserWhenStockChangesNotably(){
        $user = factory(User::class)->create(['email' => 'boomdaddy@ccrooke.com']);
        $this->seed(RetailerWithProductSeeder::class);
    }
}
