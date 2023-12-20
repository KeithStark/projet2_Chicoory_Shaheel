<?php

require_once "../models/UserOrder.php";
require_once "../models/OrderHasProduct.php";
require_once "../controllers/CartController.php";

class OrderController
{
    public function createOrder($userId, $cartItems)
    {
        $userOrderModel = new UserOrder();
        $cartController = new CartController();

        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        $orderRef = 'ORD' . date('YmdHis') . mt_rand(1000, 9999);

        $userOrderData = [
            'ref' => $orderRef,
            'order_date' => date('Y-m-d'),
            'total' => $total,
            'user_id' => $userId,
        ];

        try {
            $orderId = $userOrderModel->addUserOrder($userOrderData);

            if ($orderId > 0) {
                $orderHasProductModel = new OrderHasProduct();

                foreach ($cartItems as $item) {
                    $orderProductData = [
                        'user_order_id' => $orderId,
                        'product_id' => $item['id'],
                        'qtty' => $item['quantity'],
                        'price' => $item['price']
                    ];

                    $orderHasProductModel->addOrderHasProduct($orderProductData);
                }

                return $orderId;
            } else {
                return "Error creating order: unable to add order to database.";
            }
        } catch (Exception $e) {
            return "Error creating order: " . $e->getMessage();
        }
    }
}
