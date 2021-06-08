<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $req){
        $product =  new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->file_path = $req->file('file')->store('products');
        $product->save();
        return $product;
    }

    function list(){
        $products = Product::all();
        return $products;
    }

    function delete($id){
        $result = Product::where('id',$id)->delete();
        if($result){
            return ["result" => "product has been deleted"];
        }
        return ["result" => "fail to delete"];
    }

    function show ($id){
        $product = Product::find($id);
        return $product;
    }
    function update ($id,Request $req){
        $product = Product::find($id);
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        if($req->file('file')){
        $product->file_path = $req->file('file')->store('products');
        };
        $product->save();
        return $product;
    }
    function search($key){
        $product = Product::where('name',"LIKE","%$key%")->get();
        if(!$product){
            return [];
        }
        return $product;
    }
}

