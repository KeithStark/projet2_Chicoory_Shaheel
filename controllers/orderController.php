<?php

require_once "../models/UserOrder.php";
require_once "../models/OrderHasProduct.php";
require_once "../controllers/CartController.php";

class OrderController
{
    public function createOrder($userId, $cartItems)
    {
        $userOrderModel = new UserOrder();
        $orderHasProductModel = new OrderHasProduct();
        $cartController = new CartController();

        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        $orderRef = 'ORD' . date('YmdHis') . mt_rand(1000, 9999);

        // Create the user order
        $userOrderData = [
            'ref' => $orderRef,
            'order_date' => date('Y-m-d'),
            'total' => $total,
            'user_id' => $userId,
        ];

        try {
            $orderId = $userOrderModel->addUserOrder($userOrderData);

            if ($orderId) {
                foreach ($cartItems as $item) {
                    $orderHasProductData = [
                        'user_order_id' => $orderId,
                        'product_id' => $item['id'],
                        'qtty' => $item['quantity'],
                        'price' => $item['price'],
                    ];

                    $orderHasProductModel->addOrderHasProduct($orderHasProductData);
                }

                $cartController->emptyCart();

                header('Location: ./success.php');
                exit();
            } else {
                echo "Error creating order";
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }

        return $orderId;
    }
}
