<?php

namespace Tests\Unit;


use App\Clients\StockStatus;
use App\History;
use App\Product;
use App\Stock;
use Facades\App\Clients\ClientFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use RetailerWithProductSeeder;
use Tests\TestCase;

class ProductHistoryTest extends TestCase {

    use RefreshDatabase;

    public function testRecordHistoryEachTimeStockIsTracked(){
        $this->seed(RetailerWithProductSeeder::class);

        /*ClientFactory::shouldReceive('make->checkAvailability')
            ->andReturn(new StockStatus($available = true, $price = 99));*/
        Http::fake(function(){return ['salePrice' => 99, 'onlineAvailability' => true];});

        $product = tap(Product::first(), function($product){
            $this->assertCount(0, $product->history);
            $product->track();
            $this->assertCount(1, $product->refresh()->history);
        });

        $history = $product->history->first();
        $stock = $product->stock[0];

        $this->assertEquals($stock->price, $history->price);
        $this->assertEquals($stock->in_stock, $history->in_stock);
        $this->assertEquals($stock->product_id, $history->product_id);
        $this->assertEquals($stock->id, $history->stock_id);
    }
}
