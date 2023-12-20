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

        // Calculate the total cost of the cart items
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        // Generate a unique order reference
        $orderRef = 'ORD' . date('YmdHis') . mt_rand(1000, 9999);

        // Prepare the user order data
        $userOrderData = [
            'ref' => $orderRef,
            'order_date' => date('Y-m-d'),
            'total' => $total,
            'user_id' => $userId,
        ];

        try {
            $orderId = $userOrderModel->addUserOrder($userOrderData);

            if ($orderId > 0) {
                return $orderId; // Order created successfully
            } else {
                return "Error creating order: unable to add order to database.";
            }
        } catch (Exception $e) {
            return "Error creating order: " . $e->getMessage();
        }
    }
}
