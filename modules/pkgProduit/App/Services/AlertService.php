<?php

namespace Modules\pkgProduit\App\Services;

use Modules\pkgProduit\Models\Produit;

class AlertService
{

    public function getProduitsEnAlerte()
    {
        $products = getProducts();
        $rules = getRuls();
        return [$products, $rules];
    }

    public function getRuls()
    {
        return Rules::all();
    }

    public function getProducts()
    {
        return Produit::paginate(5);
    }

    public function createProduit(array $data)
    {
        Produit::create($data);
    }
}