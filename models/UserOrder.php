<?php

require_once('Crud.php');

class UserOrder extends Crud
{
    protected $id;
    protected $ref;
    protected $order_date;
    protected $total;
    protected $user_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUserOrders()
    {
        return $this->getAll('user_order');
    }

    public function getUserOrderById($id)
    {
        return $this->getById('user_order', $id);
    }

    public function addUserOrder($userOrderData)
    {
        $columns = implode(", ", array_keys($userOrderData));
        $values = ":" . implode(", :", array_keys($userOrderData));

        $sql = "INSERT INTO user_order ($columns) VALUES ($values)";
        $stmt = $this->connexion->prepare($sql);

        foreach ($userOrderData as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":$key", $value, $paramType);
        }

        try {
            if ($stmt->execute()) {
                return $this->connexion->lastInsertId();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


    public function updateUserOrderById($id, $userOrderData)
    {
        return $this->updateById('user_order', $id, $userOrderData);
    }

    public function deleteUserOrderById($id)
    {
        return $this->deleteById('user_order', $id);
    }
}
