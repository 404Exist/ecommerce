<?php

namespace App\Traits;

trait HasSku
{
    private function sku($product, $l = 2): string
    {
        $pname = strtoupper(substr(trim($product->title), 0, $l));
        $cat = strtoupper(substr(trim($product->category->title), 0, $l));
        $brand = strtoupper(substr($product->brand->title, 0, $l));
        $id = str_pad($product->id, 4, 0, STR_PAD_LEFT);

        return "{$pname}-{$cat}{$brand}{$id}";
    }
}
