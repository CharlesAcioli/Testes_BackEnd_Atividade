<?php

class DiscountCalculatorTest {
    public function ShouldApply_WhenValueIsAboveMinimunTest(){

        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;
        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 110;
        $this->asserEquals($expectedValue, $totalWithDiscount);
    }
    public function asserEquals($expectedValue, $actualValue){
        if($expectedValue !== $actualValue){

            $message = 'Expected: ' . $expectedValue . ' but got: ' . $actualValue;
            throw new Exception($message);
        }

        echo "Teste passed ! \n";
    }
}