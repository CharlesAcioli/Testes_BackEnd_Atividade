<?php

class FreeShippingCalculator{
    const MINIMUM_FREE_SHIPPING = 150;

    public function apply(float|int $value): bool{
        if ($value >= self::MINIMUM_FREE_SHIPPING){
            return $value = "Frete Grátis";
        }else{
            return false;
        }
    }
}