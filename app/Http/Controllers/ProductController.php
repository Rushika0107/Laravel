<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('list',[
            'products' => $products
        ]);

        // Logic for listing products can be added here
    }

    public function create()
    {
        return view('create'); // Updated to return the existing create view
    }

    public function store(Request $request)
    {
        $rules=[
            'name'=>'required',
            'price'=>'required|numeric',
            'sku'=>'required|min:3'
        ];

        if($request->image !=''){
            $rules['iamge'] = 'image';
        }
       
       $validator = Validator::make ($request->all(),$rules);
       if($validator->fails()){
        return redirect()->route('products.create')->withInput()->withErrors($validator);
       }

       $product = new Product();
       $product->name = $request->name;
       $product->price = $request->price;
       $product->sku = $request->sku;
       $product->description = $request->description;
       $product->save();

       if($request->image !=''){

       $image = $request->image;
       $ext= $image->getClientOriginalExtension();
       $imagename = time().'.'.$ext;

       $image->move(public_path('uploads/products'),$imagename);

       $product->image =$imagename;
       $product->save();
       }

       return redirect()->route(route: 'products.index')->with('success','Product created successfully');

       
        // Logic for storing products can be added here
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit',[
            'product'=> $product
        ]);

    }

    public function update($id,Request $request)
    {
        $product = Product::findOrFail($id);
        $rules = [
            'name'=>'required',
            'price'=>'required|numeric',
            'sku'=>'required',
        ];
        if($request->image !=''){
            $rules['iamge'] = 'image';
        }

        $validator = Validator::make ($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
           }
       $product->name = $request->name;
       $product->price = $request->price;
       $product->sku = $request->sku;
       $product->description = $request->description;
       $product->save();

       if($request->image !=''){
        File::delete(public_path('uploads/products/'.$product->image));


        $image = $request->image;
        $ext= $image->getClientOriginalExtension();
        $imagename = time().'.'.$ext;
 
        $image->move(public_path('uploads/products'),$imagename);
 
        $product->image =$imagename;
        $product->save();
        }
        return redirect()->route(route: 'products.index')->with('success','Product updated successfully');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        File::delete(public_path('uploads/products/'.$product->image));

        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
