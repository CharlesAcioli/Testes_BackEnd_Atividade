<?php

class FreeShippingCalculatorTest{
    public function apllyDiscountShippingFree(){
        $freeShipping = new FreeShippingCalculator();

        $totalvalue = 150;
        $totalShipping =  $freeShipping->apply($totalvalue);
        
        $expectedValue = true;
        $this->asserEquals($expectedValue, $totalShipping);
    }

    public function asserEquals($expectedValue, $actualValue){
        if($expectedValue !== $actualValue){
            $message = 'Expected ' . $expectedValue . 'but got ' . $actualValue;
            throw new Exception($message);
        }

        echo "Test passed!";
    }
}