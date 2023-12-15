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
        return $this->add('user_order', $userOrderData);
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
