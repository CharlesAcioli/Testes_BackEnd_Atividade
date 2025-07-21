<?php

class DiscountCalculator{
    
    const MINIMUM_VALUE = 100; //compra minima
    const DISCOUNT_VALUE = 20; //desconto

    public function apply($value){
        if ($value > self::MINIMUM_VALUE){ //se for maior que valor de compra minimo aplica desconto
            return $value - self::DISCOUNT_VALUE;
        }

        return $value;
    }
}