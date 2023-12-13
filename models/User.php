<?php

require_once('./models/Crud.php');

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
        parent::__construct(); // No need to pass 'user' as a parameter here, parent class constructor already handles it
    }

    public function getAllUsers()
    {
        return $this->getAll('user');
    }

    public function getUserById($id)
    {
        return $this->getById('user', $id);
    }

    public function getUserByUsername($username)
    {
        return $this->getByColumn('user', 'username', $username);
    }

    public function addUser($userData)
    {
        $userData['pwd'] = $this->hashPassword($userData['pwd']);
        return $this->add('user', $userData);
    }

    public function updateUserById($id, $userData)
    {
        $userData['pwd'] = $this->hashPassword($userData['pwd']);
        return $this->updateById('user', $id, $userData);
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
