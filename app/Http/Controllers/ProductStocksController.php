<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductStocksController extends Controller
{
    /**
     * @var ProductStock
     */
    protected $model;

    /**
     * ProductStocksController constructor.
     * @param ProductStock $model
     */
    public function __construct(ProductStock $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $productStocks = ProductStock::all();
        $total = 0;

        foreach ($productStocks as $productStock) {
            $total += $productStock['data']['quantity'] * $productStock['data']['price'];
        }

        return response([
            'stocks' => $productStocks,
            'total' => $total,
        ]);
    }

    public function create()
    {
        return view('pages.productstock.create');
    }

    public function store(Request $request)
    {
        $attributes['data'] = $request->all();
        unset($attributes['data']['_token']); // delete csrf token from data

        $model = ProductStock::create($attributes);

        return $this->index();
    }
}
