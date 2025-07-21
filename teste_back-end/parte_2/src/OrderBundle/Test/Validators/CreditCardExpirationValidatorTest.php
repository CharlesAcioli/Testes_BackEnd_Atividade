<?php
namespace OrderBundle\Test\Validators;

use DateTime;
use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\CreditCardExpirationValidator;

class CreditCardExpirationValidatorTest extends TestCase{
    public function isCardExpired(string $expirationDate): bool{

        $expirationDate = trim($expirationDate);// Remove espaços extras

        // Tentando criar a data de expiração no formato correto
        $exp = DateTime::createFromFormat('m/Y', $expirationDate);

        if(!$exp || $exp->format('m/Y') !== $expirationDate){
         return true; // Se a data for inválida, considera como expirado
        }

        $exp->modify('last day of this month'); //Ajusta para o último dia do mês da validade. O nome precisa ser em inglês mesmo, pois ocasiona erro se não por. Propriedade nativa.
        $exp->setTime(23, 59, 59);// Define para o final do dia

        $now = new DateTime('now');
        // $now->setTime(0, 0, 0);// Defina para meia-noite (início do dia de hoje)

        return $exp->getTimestamp() < $now->getTimestamp(); // Se a data de expiração for menor que hoje, é expirada
    }

    public function testCardNotExpired(){
        $validDate = (new DateTime('+ 1 month'))->format('m/Y');
        $this->assertFalse($this->isCardExpired($validDate), "Cartão não deve esta expirado!");
    }

    public function testCardExpired() {
        $expiredDate = (new DateTime('-1 month'))->format('m/Y');
        $this->assertTrue($this->isCardExpired($expiredDate), "Cartão deve estar expirado!");
    }

    public function testCardExpiredLastDayOfMonth() {
        $lastDayOfMonth = (new DateTime('last day of next month'))->format('m/Y');
        $this->assertFalse($this->isCardExpired($lastDayOfMonth), "Cartão não deve estar expirado no último dia do mês!");
    }
    
    public function testCardExpiringThisMonth() {
        $thisMonthEnd = (new DateTime('last day of this month'))->format('m/Y');
        $this->assertFalse($this->isCardExpired($thisMonthEnd), "Cartão não deve estar expirado ainda no final deste mês!");
    }

    public function testCardExpiringNextMonth() {
        $nextMonth = (new DateTime('+1 month'))->format('m/Y');
        $this->assertFalse($this->isCardExpired($nextMonth), "Cartão não deve estar expirado no próximo mês!");
    }

    public function testCardExpiringInTheFuture() {
        $futureDate = '12/2030';
        $this->assertFalse($this->isCardExpired($futureDate), "Cartão não deve estar expirado com validade para 2030!");
    }

    public function testCardInvalidExpirationDate() {
        $invalidDate = 'invalid-date';
        $this->assertTrue($this->isCardExpired($invalidDate), "Cartão com data inválida deve ser considerado expirado!");
    }

    public function testCardExpiredBeforeEndOfMonth() {
        $pastDate = (new DateTime('-2 months'))->format('m/Y');
        $this->assertTrue($this->isCardExpired($pastDate), "Cartão com data anterior ao final do mês passado deve ser expirado!");
    }

    public function testCardExpirationDateWrongFormat() {
        $wrongFormatDate = '30/12/2025'; // formato dd/mm/yyyy
        $this->assertTrue($this->isCardExpired($wrongFormatDate), "Cartão com formato de data errado deve ser considerado expirado!");
    }

    public function testCardExpirationWithSpaces() {
        $dateWithSpaces = ' 12/2025 '; //A data precisa ser futura também.
        $this->assertFalse($this->isCardExpired($dateWithSpaces), "Cartão com espaços em branco ao redor da data não deve ser expirado!");
    }

    public function testCardExpiringToday() {
        $today = (new DateTime('today'))->format('m/Y');
        $this->assertFalse($this->isCardExpired($today), "Cartão com data de expiração para hoje não deve ser expirado!");
    }
}