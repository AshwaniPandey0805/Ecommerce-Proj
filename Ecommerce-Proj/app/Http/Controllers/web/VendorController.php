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
}
