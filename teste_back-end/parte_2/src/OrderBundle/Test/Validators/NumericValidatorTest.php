<?php

namespace OrderBundle\Test\Validators;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NumericValidator;

use function PHPUnit\Framework\assertEquals;

class NumericValidatorTest extends TestCase{
    public function test(){
        $dataProvider = [
            "" =>false,
            1 => true,
        ];
        foreach ($dataProvider as $value =>$expectedResults){
            $numericIsValidator = new NumericValidator($value);

            $isValid = $numericIsValidator->isValid();
            $this ->assertEquals($expectedResults, $isValid);
        }
    }
}

// class NumericValidatorTest extends TestCase{
//     public function testNumericEmpty(){
//         $numeric = "";
//         $numericIsValidator = new NumericValidator($numeric);
//         $isValid = $numericIsValidator ->isValid();
//         $this->assertFalse($isValid);

//     }
//     public function testNumericNotEmpty(){
//         $numeric = "1";
//         $numericIsValidator = new NumericValidator($numeric);
//         $isValid = $numericIsValidator ->isValid();
//         $this->assertTrue($isValid);

//     }
// }

?>