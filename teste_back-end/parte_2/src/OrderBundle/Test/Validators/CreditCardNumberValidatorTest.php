<?php

namespace OrderBundle\Test\Validators;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\CreditCardNumberValidator;


// class CreditCardNumberValidatorTest extends TestCase{
//     public function test(){

//     }
// }

class CreditCardNumberValidatorTest extends TestCase{
    public function testCreditCardNumber(){
        $numberCard = "0000000000000000";
        $numberCreditCard = new CreditCardNumberValidator($numberCard);

        $this->assertTrue($numberCreditCard->isValid());
        // $isValid = $numberCreditCard -> isValid();
        // $this->assertTrue($isValid);
    }

    public function testCreditCardNotNumber(){
        $emptyNumber = "";
        $numberCreditCard = new CreditCardNumberValidator($emptyNumber);
        $isNotValid = $numberCreditCard -> isValid();
        $this->assertFalse($isNotValid);
    }

    public function testCreditCardNotNumberWithLettersReturnFalse(){
        $invalidNumber = "000a000000000000";
        $validator = new CreditCardNumberValidator($invalidNumber);

        $this->assertFalse($validator->isValid());
    }

    public function testCreditCardNotNumberWithSpacesReturnFalse(){
        $numberWithSpaces = "4111 1111 1111 1111";
        $validator = new CreditCardNumberValidator($numberWithSpaces);

        $this->assertFalse($validator->isValid());
    }
}

// Nesse teste foi preciso informar a quantidade de dígitos contido no cartão em forma de String.