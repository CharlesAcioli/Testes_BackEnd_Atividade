<?php

class StudentDiscountChecker{
    const MINIMUM_AGE = 25;
    const DISCOUNT_VALUE = true;

    public function apply($value){
        if($value <= self::MINIMUM_AGE){
            return true;
        }else{
            return false;
        }
    }
}