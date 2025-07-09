<?php

include 'autoloader.php';
include 'DiscountCalculator.php';

$discountCalculator = new DiscountCalculator();
echo $discountCalculator->apply(value:200) . "\n";