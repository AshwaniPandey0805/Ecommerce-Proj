<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductManagerController extends Controller
{
    /**
     * get product page
     */
    public function getProductPannel(){

        return view('vendor.vendor_viewProducts');

    }

    /**
     * insert product detils to database
     */
    public function postProductDetails(Request $request){
        $data =  $request->validate([
            'productName' => 'required',
            'skuNumber' => 'required',
            'sellingPrice' => 'required',
            'costPrice' => 'required',
            'productID' => 'required',
            'category' => 'required',
        ]);

        dd($data);

        
    }

    /**
     * get Product detils
     */
    public function getProductDetails(Request $request){
        dd("view Product detils");
    }
}
