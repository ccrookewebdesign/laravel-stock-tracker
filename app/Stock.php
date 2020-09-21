<?php

namespace App;

/**
 * Class Stock
 *
 * @package App
 * @property int id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Stock extends BaseModel {

    protected $table = 'stock';

    protected $visible = ['id', 'price', 'in_stock'];

    protected $casts = [
        'in_stock' => 'boolean'
    ];

    public function retailer(){
        return $this->belongsTo(Retailer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function track($callback = null){
        $status = $this->retailer->client()->checkAvailability($this);

        $this->update([
            'in_stock' => $status->available,
            'price'    => $status->price,
        ]);

        $callback && $callback($this);
    }

}
