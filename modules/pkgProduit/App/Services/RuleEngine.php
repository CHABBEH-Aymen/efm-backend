<?php

namespace Modules\pkgProduit\App\Services;

use Modules\pkgProduit\Models\Produit;

class RuleEngine
{

    public function getProducts()
    {
        return Produit::paginate(5);
    }
    public function createProduit(array $data)
    {
        Produit::create($data);
    }
    /**
     * Method to execute rules on the provided data
     * @param string $rule
     * @param array $data
     * @return void
     */
    public function evaluate(string $rule, array $data): bool
    {
        $stock = $data['stock'];
        $prix = $data['prix'];
        // Replace variables in the rule with the actual values from $data
        $rule = str_replace(['stock', 'prix'], [$stock, $prix], $rule);

        // Now evaluate the rule using eval (be cautious!)
        return (bool) eval ('return ' . $rule . ';');
    }
}