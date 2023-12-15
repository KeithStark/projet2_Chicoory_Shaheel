<?php

require_once('Crud.php');

class Address extends Crud
{
    protected $id;
    protected $street_name;
    protected $street_nb;
    protected $city;
    protected $province;
    protected $zipcode;
    protected $country;

    public function __construct()
    {
        parent::__construct('address');
    }


    public function getAllAddresses()
    {
        return $this->getAll('address');
    }

    public function getAddressById($id)
    {
        return $this->getById('address', $id);
    }

    public function getAddressByStreetAndNumber($street, $streetNumber)
    {
        return $this->getByColumn('address', 'street_name', $street);
    }

    public function addAddress($addressData)
    {
        return $this->add('address', $addressData);
    }

    public function updateAddressById($id, $addressData)
    {
        return $this->updateById($id, $addressData);
    }

    public function deleteAddressById($id)
    {
        return $this->deleteById('address', $id);
    }
}
