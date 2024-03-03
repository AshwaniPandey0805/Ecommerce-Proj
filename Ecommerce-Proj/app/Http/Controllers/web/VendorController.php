<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * get Vender dash Board page
     */
    public function getVenderPage(){
        return view('vendor.vendor_dashBoard');
    }

    /**
     * getting vendor, add product UI
     */
    public function addProduct(){
        return view('vendor.vendor_addProducts');
    }

    /**
     * getting catrgory
     */
    public function addProductDetails(Request $request){
        $request->validate([
            'category' => 'required',
        ]);

        $category =(int) $request->category;
        // dd($category);

        return view('vendor.vendor_addProductDetials',['selectedCategory' => $category]);
    }
}
