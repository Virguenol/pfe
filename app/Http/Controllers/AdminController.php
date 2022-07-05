<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //category
    public function view_category()
    {
        $datas=Category::all();
        return view('admin.categories.category', compact('datas'));
    }

    public function add_category(Request $request)
    {
        $data=new Category();
        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'la categorie a bien été ajouter');

    }

    public function delete_category($id)
    {
        $data=Category::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'la categorie a bien été supprimer');    
    }

    //produits

    public function view_product()
    {
        $category = Category::all();
        return view('admin.products.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image =  $imagename;
        

        $product->save();
        return redirect()->back()->with('message', 'le produit a bien été Ajouter');
    }

    public function index_product()
    {
        $products = Product::all();
        return view('admin.products.index_product', compact('products'));
    }

    public function delete_product($id)
    {
        $data=Product::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'le produits a bien été supprimer');    
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        
        return view('admin.products.update_product', compact('product','category'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image =  $imagename;
        

        $product->save();
        return redirect()->back()->with('message', 'le produit a bien été Ajouter');
    }
}
