<?php

namespace OrderBundle\Repository;

use MyFramework\DataBase\ORM;


class CustomerRepository extends ORM
{
    public function findByID($customerID)
    {
        /**
         * $customerData = SELECT name, id FROM customer WHERE id = X
         * $customer = new Customer($customerData['name'], $customerData['id'])
         * return $customer
         */
        return parent::findByID($customerID);
    }
}