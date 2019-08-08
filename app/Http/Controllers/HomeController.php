<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');//->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::latest()->paginate(8);
        return view('home',compact('products'));
    }

    
    public function add(Request $request){
        $product=Product::find($request->input('id'));
        $product->quantity-=1;
        $product->save();

        $cart=cart::where([['user_id','=',auth()->user()->id],['product_id','=',$request->input('id')]])->first();
        if(isset($cart)){
            cart::where('user_id','=',auth()->user()->id)->where('product_id','=',$request->input('id'))->update(['quantity'=>$cart->quantity+=1,'price'=>$cart->price+=$request->input('price')]);
        }
        else{
            $cart=new cart;
            $cart->product_id=$request->input('id');
            $cart->user_id=auth()->user()->id;
            $cart->price=$request->input('price');
            $cart->quantity=1;
            $cart->save();

        }
        // $user=User::find(auth()->user()->id);
        //     $user->products()->attach($request->input('id'),['quantity'=>1,'price'=>$request->input('price')]);
        //     $user->save();
       
        return redirect('home');
    }
    public function show(){
        $user=User::find(auth()->user()->id);
        return view('cart',compact('user'));

    }
    public function destroy(Request $request){
        $product=Product::find($request->input('id'));
        $product->quantity+=$request->input('quantity');
        $product->save();
         $user=User::find(auth()->user()->id);
         $user->products()->detach($request->input('id'));
          return redirect('cart');
    }
}
