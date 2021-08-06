<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'slug' => 'required'
        ]);
        Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        return Product::find($id)->update($request->all());
    }

    public function search($name) 
    {
        return Product::where('name', 'like', '%'. $name . '%')->get();
    }

    public function destroy($id)
    {
        return Product::find($id)->delete();
    }
}
