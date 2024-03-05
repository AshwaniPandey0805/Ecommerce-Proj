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
        $categories = ProductCategory::where('category_id', 1)
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
     * add category to table and get form table
     */
    public function addProductItem(){
        $categories = ProductCategory::where('category_id', 1)
                                        ->orWhereNull('category_id')
                                        ->get();
                                        dd($categories);
        return view('vendor.vendor_addProductPannel',['categories' => $categories]);
    }

    /**
     * get sub categories
     */
    public function getSubCategory(Request $request){

        // $categories = ProductCategory::where('category_id', 8)
        // // ->orWhereNull('category_id')
        // ->get();

        $SubCategories = ProductCategory::where('category_id', $request->id)
        ->get();

        // return view('vendor.vendor_addProductPannel', [
        //     'categories' => $categories,
        //     'subCategories' => $SubCategories,
        // ]);

        return response()->json($SubCategories);
        

    }

    /**
     * get category ID
     */
    public function getCategoryID(Request $request){

        $categoryID = ProductCategory::where('id', $request->id)->get();

        return response()->json($categoryID);
    }

    
    
}
