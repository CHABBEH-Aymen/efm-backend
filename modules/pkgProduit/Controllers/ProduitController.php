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
        dd($this->engine->evaluate("stock < 5 && prix > 100",['stock' => 2, 'prix' => 150]));
    }
}
