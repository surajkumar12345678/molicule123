<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\StoreDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class ProductsImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {   
        $store_id = StoreDetail::select('id')->where('user_id', Auth::id())->first();
        return new Product([
            'category'     => $row['category'],
            'title'        => $row['title'],
            'description'  => $row['description'],
            'feature_image'=> $row['feature_image'],
            'product_type' => $row['product_type'],
            'sku'          => $row['sku'],
            'price'        => $row['price'],
            'gtin'         => $row['gtin'],
            'stock'        => $row['stock'],
            'product_mode' => $row['product_mode'],
            'shipping'     => $row['shipping'],
            'best_seller'  => $row['best_seller'],
            'user_id'      => Auth::id(),
            'store_detail_id'  => $store_id->id
        ]);
    }
}
