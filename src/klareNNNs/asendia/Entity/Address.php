<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class Address
{

    private $address1;
    private $addressType;
    private $cellPhone;
    private $city;
    private $contact;
    private $email;
    private $ISOCountry;
    private $name;
    private $zipCode;
    private $address2;

    public function __construct($address1, $addressType, $cellPhone, $city, $contact, $email, $ISOCountry, $name, $zipCode, $address2 = '')
    {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->addressType = $addressType;
        $this->cellPhone = $cellPhone;
        $this->city = $city;
        $this->contact = $contact;
        $this->email = $email;
        $this->ISOCountry = $ISOCountry;
        $this->name = $name;
        $this->zipCode = $zipCode;
    }

    public function getAddress1()
    {
        return $this->address1;
    }

    public function getAddressType()
    {
        return $this->addressType;
    }

    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getISOCountry()
    {
        return $this->ISOCountry;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getAddress2()
    {
        return $this->address2;
    }


}