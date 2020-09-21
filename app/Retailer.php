<?php

namespace App;

use Carbon\Carbon;
use Facades\App\Clients\ClientFactory;

/**
 * Class Comment
 *
 * @package App
 * @property int id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Retailer extends BaseModel {

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function addStock(Product $product, Stock $stock){
        $stock->product_id = $product->id;
        $this->stock()->save($stock);
    }

    public function client(){
        return ClientFactory::make($this);
    }
}
