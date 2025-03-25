<?php

namespace Modules\pkgProduit\Controllers;

use Illuminate\Http\Request;
use Modules\pkgProduit\App\Services\RuleEngine;
use Modules\pkgProduit\App\Services\AlertService as Service;

class ProduitController
{
    public function __construct(protected Service $service)
    {
        
    }
    public function index(Request $request)
    {
        // dd($this->service->evaluate("stock < 5 && prix > 100",['stock' => 2, 'prix' => 150]));
        $products = $this->service->getProducts();
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
        $this->service->createProduit($data);
        return response()->json(['message' => 'Produit created successfully'], 200);
    }
}
