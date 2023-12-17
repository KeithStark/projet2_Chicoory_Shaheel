<?php

require_once('Crud.php');
require_once('Address.php');

class User extends Crud
{
    protected $id;
    protected $token;
    protected $username;
    protected $fname;
    protected $lname;
    protected $pwd;
    protected $billing_address_id;
    protected $shipping_address_id;
    protected $role_id;

    public function __construct()
    {
        parent::__construct('user');
    }

    public function getAllUsers()
    {
        return $this->getAll('user');
    }

    public function getUserById($id)
    {
        $user = $this->getById('user', $id);

        if ($user) {
            // Fetch billing address
            $billingAddress = $this->getAddressById($user['billing_address_id']);
            // Fetch shipping address
            $shippingAddress = $this->getAddressById($user['shipping_address_id']);

            $user['billing_address'] = $billingAddress;
            $user['shipping_address'] = $shippingAddress;
        }

        return $user;
    }

    // Retrieve address by ID using Address model
    public function getAddressById($id)
    {
        $addressModel = new Address();
        return $addressModel->getAddressById($id);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch a single row
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //getUserRoleID
    public function getUserRoleID($id)
    {
        $stmt = $this->connexion->prepare("SELECT role_id FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch a single row
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($userData)
    {
        $userData['pwd'] = $this->hashPassword($userData['pwd']);
        return $this->add('user', $userData);
    }

    public function updateUserById($id, $userData)
    {
        if (isset($userData['pwd'])) {
            $userData['pwd'] = $this->hashPassword($userData['pwd']);
        }

        return $this->updateById('user', $id, $userData);
    }

    public function updatePassword($id, $hashedPassword)
    {
        return $this->updateById('user', $id, ['pwd' => $hashedPassword]);
    }

    public function updateToken($id, $token)
    {
        $user = $this->getUserById($id);

        if (!$user) {
            return false;
        }

        return $this->updateById('user', $id, ['token' => $token]);
    }

    public function deleteUserById($id)
    {
        return $this->deleteById('user', $id);
    }

    protected function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function getUserRole($id)
    {
        $user = $this->getUserById($id);
        return $user['role_id'];
    }
}
