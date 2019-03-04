<?php

use App\Models\ProductStock;
use Illuminate\Database\Seeder;

class ProductStocksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductStock::class, 10)->create();
    }
}
