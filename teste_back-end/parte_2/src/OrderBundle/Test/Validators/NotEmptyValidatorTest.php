<?php

namespace OrderBundle\Test\Validators;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NotEmptyValidator;

class NotEmptyValidatorTest extends TestCase{

    public function testIs(){
        $dataProvider = [
            ""=>false,
            "food" => true,
        ];
        foreach($dataProvider as $value =>$expectedResults){
            
            $notEmptyValidator = new NotEmptyValidator($value);
    
            $isValid = $notEmptyValidator->isValid();
            $this->assertEquals($expectedResults, $isValid);
        }
    }

}



?>
