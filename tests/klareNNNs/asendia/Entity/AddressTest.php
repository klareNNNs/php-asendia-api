<?php

declare(strict_types=1);

use klareNNNs\asendia\Entity\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{

        public function testItShouldCreateCorrectAddress()
    {
        $address1 = 'C/NUEVA';
        $address2 = '2';
        $addressType = 'Receiver';
        $cellPhone = '+44666666666';
        $city = 'London';
        $zipCode = '28010';
        $ISOCountry = 'GB';
        $contact = '';
        $email = 'test@test.com';
        $name = 'John Doe';

        $address = new Address($address1, $addressType, $cellPhone, $city, $contact, $email, $ISOCountry, $name, $zipCode, $address2);

        $this->assertEquals($address1, $address->getAddress1());
        $this->assertEquals($addressType, $address->getAddressType());
        $this->assertEquals($cellPhone, $address->getCellPhone());
        $this->assertEquals($city, $address->getCity());
        $this->assertEquals($contact, $address->getContact());
        $this->assertEquals($email, $address->getEmail());
        $this->assertEquals($ISOCountry, $address->getISOCountry());
        $this->assertEquals($name, $address->getName());
        $this->assertEquals($zipCode, $address->getZipCode());
        $this->assertEquals($address2, $address->getAddress2());
    }
}
