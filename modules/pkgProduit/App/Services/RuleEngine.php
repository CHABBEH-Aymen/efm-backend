<?php

namespace Modules\pkgProduit\App\Services;

use Modules\pkgProduit\Models\Produit;

class RuleEngine
{
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
        try {
            $result = (bool) eval ('return ' . $rule . ';');
        } catch (\Throwable $th) {
            return "error";
        }
        // Now evaluate the rule using eval (be cautious!)
        return $result;
    }
}