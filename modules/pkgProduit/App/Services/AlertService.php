<?php

namespace Modules\pkgProduit\App\Services;

use Modules\pkgProduit\Models\Produit;
use Modules\pkgProduit\Models\Rules;

class AlertService
{
    public function __construct(protected RuleEngine $ruleEngine){}
    public function getProduitsEnAlerte()
    {
        $products = Produit::all();
        $ruls = Rules::all();
        $evaluated = [];
        $i = 0;
        foreach ($products as $product) {
            if($i == 2) $i = 0;
            $evaluate = $this->ruleEngine->evaluate($ruls[$i]->expression, ["stock"=>$product->stock, "prix"=>$product->prix]);
            if($evaluate === true)
            {
                $evaluated[] = ["product"=>$products, "rule"=>$ruls[$i]->lable];
            } elseif($evaluate === "error") {
                $evaluated[] = ["product"=>$products, "rule"=>"Error in rule"];
            }
            $i++;
        }
        return $evaluated;
    }

    public function getProducts()
    {
        return Produit::all();
    }

    public function createProduit(array $data)
    {
        Produit::create($data);
    }
}