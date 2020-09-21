<?php

namespace App;

/**
 * Class Product
 *
 * @package App
 * @property int id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends BaseModel {

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }

    public function inStock(): bool{
        return $this->stock()->where('in_stock', true)->exists();
    }

    public function track(){
        $this->stock->each->track(function($stock){
            return $this->recordHistory($stock);
        });
    }

    public function recordHistory(Stock $stock): void{
        $this->history()->create([
            'stock_id' => $stock->id,
            'price'      => $stock->price,
            'in_stock'   => $stock->in_stock,
        ]);
    }
}
