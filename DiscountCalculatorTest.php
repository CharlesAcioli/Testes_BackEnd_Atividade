<?php

class DiscountCalculatorTest{
    public function ShouldAplly_WhenValueIsAboveMinimumTest(){
        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;
        $totalWhithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 110;
        $this->asserEquals($expectedValue, $totalWhithDiscount);
    }

    public function asserEquals($expectedValue, $actualValue){
        if($expectedValue !== $actualValue){
            
            $message = 'Expected: ' . $expectedValue . 'but got: ' . $actualValue;
            throw new Exception($message);
        }

        echo "Teste passed! \n";
    }
}