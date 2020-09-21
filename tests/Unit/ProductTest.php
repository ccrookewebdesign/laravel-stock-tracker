<?php

namespace Tests\Feature;

use App\Product;
use App\Retailer;
use App\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ProductTest extends TestCase {

    use refreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckStocksForProductsAtRetailers(){

        $switch = Product::create(['name' => 'Nintendo Switch']);
        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switch->inStock());

        $stock = new Stock([
            'price' => 10000,
            'url' => 'http://ccrooke.com',
            'sku' => '12345',
            'in_stock' => true
        ]);

        $bestBuy->addStock($switch, $stock);

        $this->assertTrue($stock->fresh()->in_stock);

    }
}
