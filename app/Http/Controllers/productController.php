<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        //must login first
    }
    public function index()
    {
        $products=Product::latest()->paginate(4);
        return view('admin.show',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        //
        return view('admin.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image',
            'price'=>'required',
            'quantity'=>'required',
        ]);
        $product=new Product;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        if($request->hasFile('image')){
            $imgext=$request->file('image')->getClientOriginalExtension();
            $imgname=time().'fl.'.$imgext;
            $request->file('image')->storeAs('public/images/',$imgname);
        }
        $product->image=$imgname;
        $product->save();
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image',
            'price'=>'required',
            'quantity'=>'required',
        ]);
        $product=Product::find($id);
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        if($request->hasFile('image')){
            $imgext=$request->file('image')->getClientOriginalExtension();
            $imgname=time().'fl'.$imgext;
            $request->file('image')->storeAs('public/images/',$imgname);
        }
        else{
            $imgname=$request->input('oldimg');
        }
        $product->image=$imgname;
        $product->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        return redirect('admin');
    }
}
