<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Customer;

class Info
{
    private $refId;
    private $givenName;
    private $email;
    private $mobile;

    private $address;

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setRefId(string $refId)
    {
        $this->refId = $refId;
        return $this;
    }

    public function setGivenName(string $givenName)
    {
        $this->givenName = $givenName;
        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function setMobile(string $mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getRefId()
    {
        return $this->refId;
    }

    public function getGivenName()
    {
        return $this->givenName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function toArray()
    {
        return [
            'customer_ref_id' => $this->getRefId(),
            'given_name' => $this->getGivenName(),
            'email' => $this->getEmail(),
            'mobile' => $this->getMobile(),
        ];
    }
}
