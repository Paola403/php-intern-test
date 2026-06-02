<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('type')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $types = ProductType::all();

        return view('products.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'     => 'required|string|max:255',
            'quantity'        => 'required|integer|min:0',
            'value'           => 'required|numeric|min:0',
            'product_type_id' => 'required|exists:product_types,id',
        ]);


        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $product = Product::with('type')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $types = ProductType::all();

        return view('products.edit', compact('product', 'types'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'description'     => 'required|string|max:255',
            'quantity'        => 'required|integer|min:0',
            'value'           => 'required|numeric|min:0',
            'product_type_id' => 'required|exists:product_types,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}