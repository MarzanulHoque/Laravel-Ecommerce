<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category',compact('data'));

    }

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function delete_category($id)
    {
            $data = Category::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $data = Category::all();
        return view('admin.product',compact('data'));
    }

    public function add_product(Request $request)

    {
        $product = new product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->discount_price = $request->disc_price;
        $product->quantity = $request->quantity;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images',$imagename);

        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function show_product()
    {
        $product = Product::all();

        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');

    }

    public function edit_product($id){

        $product = Product::find($id);
        $data = Category::all();

        return view('admin.edit',compact('product','data'));
    }

    public function update_product($id,Request $request)

    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->discount_price = $request->disc_price;
        $product->quantity = $request->quantity;

        $image = $request->image;
        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images',$imagename);
            $product->image = $imagename;

        }

        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');

    }
}
