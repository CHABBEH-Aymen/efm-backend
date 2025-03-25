<?php

namespace Modules\pkgProduit\Controllers;

use Illuminate\Http\Request;
use Modules\pkgProduit\App\Services\RuleEngine;

class ProduitController
{
    public function __construct(protected RuleEngine $engine)
    {
        
    }
    public function index(Request $request)
    {
        // dd($this->engine->evaluate("stock < 5 && prix > 100",['stock' => 2, 'prix' => 150]));
        $products = $this->engine->getProducts();
        return view('pkgProduit::index', compact('products'));
    }
    public function create()
    {
        return view('pkgProduit::create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'stock' => 'required',
            'prix' => 'required'
        ]);
        $data = $request->all();
        // dd($data);
        $this->engine->createProduit($data);
        return response()->json(['message' => 'Produit created successfully'], 200);
    }
}
