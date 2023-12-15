<?php

require_once('../models/User.php');
require_once('../models/Address.php');

class AuthController
{
    //La fonction de connexion
    public function login($username, $password)
    {
        $userModel = new User();

        $user = $userModel->getUserByUsername($username);

        if (!$user) {
            return ['success' => false, 'message' => 'Username does not exist.'];
        }

        if (!password_verify($password, $user['pwd'])) {
            return ['success' => false, 'message' => 'Password is incorrect.'];
        }

        $token = bin2hex(random_bytes(64));

        $userModel->updateToken($user['id'], $token);

        return ['success' => true, 'token' => $token, 'user_id' => $user['id']];
    }


    // La fonction d'inscription
    public function signup($data)
    {
        $userModel = new User();

        // Check if the username already exists
        $existingUser = $userModel->getUserByUsername($data['username']);
        if ($existingUser) {
            return ['success' => false, 'message' => 'Username already exists.'];
        }

        // Default address id is 1
        $defaultAddressId = 1;

        // User data for insertion
        $userData = [
            'token' => bin2hex(random_bytes(64)),
            'username' => $data['username'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'pwd' => password_hash($data['password'], PASSWORD_BCRYPT),
            'billing_address_id' => $defaultAddressId,
            'shipping_address_id' => $defaultAddressId,
            'role_id' => 3, // client role
        ];

        $userModel->addUser($userData);

        return ['success' => true];
    }
}
