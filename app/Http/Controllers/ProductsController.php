<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        print_r(route('products'));
        return view('products.index');
        /*
        $title = "Welcome to my Laravel";
        $description = "CReated by Dary";

        $data = [
            'productOne' => 'Iphone',
            'productTwo' => 'Samsung',

        ];*/

        //method compact
        //return view('products.index', compact('title', 'description'));
    
        //with method
        //return view('products.index')->with('title',$title);
        //return view('products.index')->with('data',$data);
    
        //directly in the view
       /* return view('products.index', [
            'data' => $data
        ]);*/
    }

    public function show($name){
        $data = [
            'Iphone' => 'Iphone',
            'Samsung' => 'Samsung',

        ];

        return view('products.index', [
            'products' => $data[$name] ?? 'Product ' . $name . ' does not exist'
        ]);
    }
}
