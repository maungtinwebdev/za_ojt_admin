<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // if(request('search')) {
        //     Product::Where('name','like','%'.request('search').'%')->paginate(5);
        // } else  {
        //     return Product::orderBy("id","desc")->paginate(5);
        // }


        return Product::when(request('search'),function($query) {
            $query->where('name','like','%'.request('search').'%');
        })->orderBy('id', 'desc')->paginate(5);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $request_data = $request->only(['name', 'price']);

        $product = Product::create($request_data);

        return $this->successResponse(['product' => $product], 201);

            // $request->validate([
            //     "name" => "required",
            //     "price" => "required"
            // ]);
            // $product = new Product;
            // $product->name = $request->name;
            // $product->price = $request->price;
            // $product->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->only('name', 'price'));
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
