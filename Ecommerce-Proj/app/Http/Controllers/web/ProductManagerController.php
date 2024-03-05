<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductManagerController extends Controller
{
    /**
     * get product page
     */
    public function getProductPannel(){

        $categories = ProductCategory::where('category_id', 1)
        ->orWhereNull('category_id')
        ->get();

        return view('vendor.vendor_addProductPannel',compact('categories'));

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

    /**
     * add product to db
     */
    public function addProductToDB(Request $request){
        $request->validate([
            'category_ID' => 'required',
            'productNumber' => 'required',
            'skuID' => 'required',
            'sellingPrice' => 'required',
            'costPrice' => 'required',
            'quantity' => 'required',
            'manufacturer' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
    
        $data['product_name'] = $request->productNumber;
        $data['sku_number'] = $request->skuID;
        $data['selling_price'] = $request->sellingPrice;
        $data['cost_price'] = $request->costPrice;
        $data['quantity'] = $request->quantity;
        $data['weight'] = $request->weight;
        $data['maufacture'] = $request->manufacturer;
        $data['discription'] = $request->description;
        $data['category'] = (int) $request->category_ID;


        $imageData = [];
        if($files = $request->file('image')){
            // dd($files);
            foreach($files as $key => $file){
                $extension = $file->getClientOriginalExtension();
                $fileName = $key.'-'.time().'.'.$extension;

                $path = "uploade/products/";

                $file->move($path, $fileName);

                $imageData[] = [
                    'product_id' => $request->skuID,
                    'image_path' => $path.$fileName,
                ];
            }
        }

        // dd($imageData);

        /**
         * Creating product image table instance
         */
        

        // if(!$productImage){
        //     return redirect()->back()->with('error', 'image not uploadede, something went wrong');
        // }else(
        //     ret
        // )
    
        // dd($data);
        $productTable = ProductTable::create($data);
        
        foreach($imageData as $image){
            $productImage = ProductImage::create($image);
        }

        

        if(!$productTable){
            return redirect()->route('getProducts.get')->with('error', 'invalid cradentials');
        }

        return redirect()->back()->with([
            'success1'=> 'product added successfully',
            'success2' => 'image uploaded successsfully' 
        ]);
    }


    /**
     * show product list to vendor
     */
    public function getProductList(){
        $products = ProductTable::all();
        return view('vendor.vendor_productListPannel',compact('products'));
    }

    /**
     * get Product details and image
     */
    public function getProductView($skuID){

        $product = ProductTable::with('productImages')->where('sku_number', $skuID)->get();
    // return $images->toArray();
        return view('vendor.vendor_viewProducDetails', ['product' => $product[0]]);
    }

}
