<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductStock;
use App\Utility\CombinationUtility;
use App\Utility\ProductUtility;

class ProductStockService
{
    public function store(array $data, Product $product)
    {
        $collection = collect($data);

        $options = ProductUtility::get_attribute_options($collection);

        //Generates the combinations of customer choice options
        $combinations = CombinationUtility::makeCombinations($options);

        $variant = '';
        if (count($combinations[0]) > 0) {
            $product->variant_product = 1;
            $product->save();
            foreach ($combinations as $key => $combination) {
                $str = ProductUtility::get_combination_string($combination, $collection);
                $product_stock = new ProductStock();
                $product_stock->product_id = $product->id;
                $product_stock->variant = $str;
                $product_stock->price = request()['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = request()['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = request()['qty_' . str_replace('.', '_', $str)];
                $image_key = 'img_' . str_replace('.', '_', $str);
                $product_stock->image = request($image_key);

                if (empty($product_stock->image) && $collection->get('colors_active') && $collection->get('colors')) {
                    $color_name = explode('-', $str, 2)[0];
                    foreach (request()->all() as $request_key => $request_value) {
                        if (str_starts_with($request_key, 'img_') && str_starts_with(substr($request_key, 4), $color_name . '-')) {
                            if (!empty($request_value)) {
                                $product_stock->image = $request_value;
                                break;
                            }
                        }
                    }
                }
                $product_stock->save();
            }
        } else {
            unset($collection['colors_active'], $collection['colors'], $collection['choice_no']);
            $qty = $collection['current_stock'];
            $price = $collection['unit_price'];
            unset($collection['current_stock']);

            $data = $collection->merge(compact('variant', 'qty', 'price'))->toArray();

            ProductStock::create($data);
        }
    }

    public function product_duplicate_store(iterable $product_stocks, Product $product_new)
    {
        foreach ($product_stocks as $key => $stock) {
            $product_stock              = new ProductStock;
            $product_stock->product_id  = $product_new->id;
            $product_stock->variant     = $stock->variant;
            $product_stock->price       = $stock->price;
            $product_stock->sku         = $stock->sku;
            $product_stock->qty         = $stock->qty;
            $product_stock->save();
        }
    }
}
