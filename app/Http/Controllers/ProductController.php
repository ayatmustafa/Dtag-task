<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProducrRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products',Product::paginate(3))->with("user",auth()->user()->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducrRequest $request)
    {
      //dd($request->all());
      $product= Product::create([
        'name'=>$request->name,
        'image'=>$request->image->store('images','public'),
        'purchase_price'=>$request->purchase_price,
        'sale_price'=>$request->sale_price,
        'stock'=>$request->stock,
    ]);

        session()->flash('message','product added succesfully');
        return redirect()->route('products.index');
    }

    public function favorite(Product $product)
    {
        //dd(auth()->user()->id);

       // $product->users()->favorit=true;

        $product->users()->attach(auth()->user()->id);
       // $product->users()->attach_favorite(true);
        session()->flash('message',"added to favorite successfuly");
        return redirect()->route('products.index');
    }

    public function unfavorite(Product $product)
    {
        $product->users()->detach(auth()->user()->id);
       // $product->users()->attach_favorite(true);
        session()->flash('message',"added to favorite successfuly");
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.create')->withproduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProducrRequest $request,Product $product)
    {
        $data=$request->only(['name','purchase_price','sale_price','stock']);
        if($request->hasFile('image')){
          Storage::disk('public')->delete($product->image);
            $data['image']=$request->image->store('images','public');
        }

        $product->update($data);
        session()->flash('message','product updated succesfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('message',"Product Deleted successfuly");
        return redirect()->route('products.index');
    }
}
