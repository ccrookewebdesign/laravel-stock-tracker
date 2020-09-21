<?php

namespace Tests\Feature;

use App\Clients\Client;
use App\Clients\ClientException;
use App\Clients\StockStatus;
use App\Retailer;
use App\Stock;
use Facades\App\Clients\ClientFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use RetailerWithProductSeeder;
use Tests\TestCase;

class StockTest extends TestCase {

    use refreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testThrowExceptionIfClientNotFoundWhenTracking(){

        $this->seed(RetailerWithProductSeeder::class);

        Retailer::first()->update(['name' => 'Boom']);

        $this->expectException(ClientException::class);

        Stock::first()->track();

    }


    /**
     *
     * @return void
     */
    /*public function testUpdateLocalStockStatusAfterBeingTracked(){

        $this->seed(RetailerWithProductSeeder::class);

        ClientFactory::shouldReceive('make->checkAvailability')
            ->andReturn(new StockStatus($available = true, $price = 10000));

        $stock = tap(Stock::first())->track();

        $this->assertTrue($stock->in_stock);
        $this->assertEquals(10000, $stock->price);

    }*/
}

