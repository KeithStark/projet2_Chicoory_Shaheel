<?php

require_once('../models/Product.php');

class CartController
{

    //function getCartItems
    public function getCartItems()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $productModel = new Product();
        $products = [];

        foreach ($cart as $productId => $quantity) {
            $product = $productModel->getProductById($productId);
            $product['quantity'] = $quantity;
            $products[] = $product;
        }

        return $products;
    }


    public function addToCart($productId, $quantity = 1)
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if (isset($cart[$productId])) {
            $_SESSION['cart_message'] = 'Product is already in the cart.';
        } else {
            $cart[$productId] = $quantity;
            $_SESSION['cart_message'] = 'Product added to the cart.';
        }

        $_SESSION['cart'] = $cart;
    }


    public function emptyCart()
    {
        unset($_SESSION['cart']);
    }

    public function modifyCart($productId, $quantity)
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if ($quantity > 0) {
            $cart[$productId] = $quantity;
        } else {
            unset($cart[$productId]);
        }

        $_SESSION['cart'] = $cart;
    }

    public function deleteFromCart($productId)
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        unset($cart[$productId]);
        $_SESSION['cart'] = $cart;
    }
}
