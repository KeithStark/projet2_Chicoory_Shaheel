<?php

require_once('Crud.php');

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
        return $this->getById('user', $id);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch a single row
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($userData)
    {
        // Hash the password before adding the user
        $userData['pwd'] = $this->hashPassword($userData['pwd']);
        return $this->add('user', $userData);
    }

    public function updateUserById($id, $userData)
    {
        // Check if 'pwd' key exists before hashing the password
        if (isset($userData['pwd'])) {
            $userData['pwd'] = $this->hashPassword($userData['pwd']);
        }

        return $this->updateById('user', $id, $userData);
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
