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
        $nextIdStatement = $this->connexion->query("SELECT MAX(id) + 1 as next_id FROM user_order");
        $nextId = $nextIdStatement->fetch(PDO::FETCH_ASSOC)['next_id'] ?? 1;
        $nextId = $nextId ?: 1;

        $userOrderData['id'] = $nextId;
        $columns = implode(", ", array_keys($userOrderData));
        $placeholders = ":" . implode(", :", array_keys($userOrderData));
        $sql = "INSERT INTO user_order ($columns) VALUES ($placeholders)";
        $stmt = $this->connexion->prepare($sql);

        foreach ($userOrderData as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":$key", $value, $paramType);
        }

        try {
            if ($stmt->execute()) {
                return $nextId;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error in addUserOrder: " . $e->getMessage());
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
