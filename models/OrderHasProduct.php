<?php

require_once('Crud.php');

class OrderHasProduct extends Crud
{
    protected $user_order_id;
    protected $product_id;
    protected $qtty;
    protected $price;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrderHasProducts()
    {
        return $this->getAll('order_has_product');
    }

    public function getOrderHasProductByOrderId($orderId)
    {
        return $this->getByColumn('order_has_product', 'user_order_id', $orderId);
    }

    public function addOrderHasProduct($orderHasProductData)
    {
        return $this->add('order_has_product', $orderHasProductData);
    }

    public function updateOrderHasProduct($orderId, $productId, $orderHasProductData)
    {
        $sql = "UPDATE order_has_product 
                SET qtty = :qtty, price = :price 
                WHERE user_order_id = :orderId AND product_id = :productId";

        $orderHasProductData['orderId'] = $orderId;
        $orderHasProductData['productId'] = $productId;

        return $this->execute($sql, $orderHasProductData);
    }

    public function deleteOrderHasProduct($orderId, $productId)
    {
        $sql = "DELETE FROM order_has_product WHERE user_order_id = :orderId AND product_id = :productId";

        $conditions = [
            'orderId' => $orderId,
            'productId' => $productId
        ];

        return $this->execute($sql, $conditions);
    }

    // Helper method to execute queries
    private function execute($sql, $params)
    {
        $PDOStatement = $this->connexion->prepare($sql);

        foreach ($params as $key => $value) {
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $PDOStatement->bindValue(':' . $key, $value, $paramType);
        }

        return $PDOStatement->execute();
    }
}
