<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Cart;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = Category::all();
        $product = Product::paginate(6);
        $sale = Product::where('discount_price', '!=', 'null')->get();
        return view('home.userpage', compact('product', 'data', 'sale'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'En traitement...')->get()->count();



            return view('admin.home', compact('total_product','total_order', 'total_user','total_revenue', 'total_delivered', 'total_processing'));
        }
        else
        {
            $product = Product::paginate(6);
            $sale = Product::where('discount_price', '!=', 'null')->get();
            $data = Category::all();
            return view('home.userpage',compact('product', 'data', 'sale'));
        }
    }

    public function product_details($id)
    {
        $products = Product::find($id);
        return view('home.products.product_details',compact('products'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $product = Product::find($id);

            $product_exist_id = Cart::where('Product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price !=null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price = $product->price * $cart->quantity;
            }
                $cart->save(); 
                return redirect()->black()->with('message', 'Produit ajouter');

            }

            else
            {
                $cart = new Cart();

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if($product->discount_price !=null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else{
                $cart->price = $product->price * $request->quantity;
            }
            
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back()->with('message', 'Produit ajouter');

            }

            
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
             $carts = Cart::where('user_id', '=',$id)->get();
             return view('home.carts.show_cart', compact('carts'));
        }
        else
        {
            return redirect('login');
        }
        
    }
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach($data as $data)
        {
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'payer a la livraison';
            $order->delivery_status = 'En traitement...';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();

        }
        return redirect()->back()->with('message','Nous avons reçu votre commande. Nous vous recontacterons bientôt...');
    }


    public function stripe($totalprice)
    {
        return view('home.carts.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach($data as $data)
        {
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'payer';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    /* Commande du client*/
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', '=', $userid)->get();
            return view('home.orders.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Annuler';
        $order->save();
        return redirect()->back();
    }

    /*recherche*/
    public function product_search(Request $request)
    {   
        $sale = Product::where('discount_price', '!=', 'null')->get();
        $data = Category::all();
        $serach_text = $request->search;
        $product = Product::where('title','LIKE', "%serach_text%")->orWhere('category->','LIKE',"%serach_text%")->paginate(10);
        return view('home.userpage', compact('product', 'data', 'sale'));
    }

    public function index_blog()
    {
        $posts = Post::latest()->get();
        return view('home.blogs.index', compact('posts'));
    }

    public function show_post(Post $post)
    {
        $posts = Post::all();
        return view('home.blogs.show', compact('posts'));
    }

    public function product()
    {
        $data = Category::all();
        $product = Product::paginate(6);
        $sale = Product::where('discount_price', '!=', 'null')->get();
        return view('home.products.all_product', compact('product', 'data', 'sale'));
    }

    /*recherche*/
    public function search_product(Request $request)
    {   
        $sale = Product::where('discount_price', '!=', 'null')->get();
        $data = Category::all();
        $serach_text = $request->search;
        $product = Product::where('title','LIKE', "%serach_text%")->orWhere('category->','LIKE',"%serach_text%")->paginate(10);
        return view('home.userpage', compact('product', 'data', 'sale'));
    }
}
