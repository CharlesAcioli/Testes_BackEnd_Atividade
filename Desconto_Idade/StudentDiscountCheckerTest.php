<?php

class StudentDiscountCheckerTest{
    public function applyDiscount(){
        $discountChecker = new StudentDiscountChecker();
        $totalAge = 25;

        $totalDiscount = $discountChecker->apply($totalAge);

        $expectedValue = true;
        $this->asserEquals($expectedValue, $totalDiscount);
    }

    public function asserEquals($expectedValue, $actualValue){
        if($expectedValue !== $actualValue){
            $message = 'Expected ' . $expectedValue . 'but got ' . $actualValue;
            throw new Exception($message);
        }

        echo "Teste passed!";
    }
}