<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
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
        $categories = ProductCategory::where('category_id', 8)
        ->orWhereNull('category_id')
        ->get();
        return view('vendor.vendor_categoryManagement', compact('categories'));
    }

    /**
     * creating category
     */
    public function storeCategory(Request $request){
        $data = array(
            'category_name' => $request->categoryName, 
            'category_id' => $request->categoryID
        );

        // dd($data);

        $create = ProductCategory::create($data);

        return redirect()->route('addProduct.get');
    }

    /**
     * get addProduct pannel -> Get Method
     */
    // public function addProductItmes(){
    //     return view('vendor.vendor_addProductPannel');
    // }
    
}
