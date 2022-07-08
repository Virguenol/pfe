<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

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

    public function order()
    {
        $orders = Order::all();
        return view('admin.orders.order', compact('orders'));
    }
//commande livrais
    public function delivered($id)
    {
         $order = Order::find($id);
         $order->delivery_status = "Livrer";
         $order->payment_status='payer';
         $order->save();

         return redirect()->back();
    }

    //pdf
    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdfs.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    //Envoyer le mail formulaire
    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.emails.email_info', compact('order'));
    }

    //Envoi du mail
    public function send_user_email(Request $request, $id)
    {

        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));
    }

    //Fonction de recherche
    public function searchdata(Request $request)
    {
        $searchText = $request->search ;
        
        $orders = Order::where('name','LIKE',"%searchText%")->orWhere('phone','LIKE',"%searchText%")->orWhere('product_title','LIKE',"%searchText%")->get();
        return view('admin.orders.order', compact('orders'));

    }

    public function index_user(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.sidebar', compact('user'));
    }
} 
