<?php
include "./includes/Header.php";
require_once "../controllers/OrderController.php";
require_once "../models/UserOrder.php";
require_once "../models/OrderHasProduct.php";
require_once "../models/Product.php";
require_once "../models/User.php";

$orderController = new OrderController();
$userOrderModel = new UserOrder();
$orderHasProductModel = new OrderHasProduct();
$productModel = new Product();
$userModel = new User();

$orders = $userOrderModel->getAllUserOrders();
?>

<main>
    <section>
        <div class="container py-4">
            <center>
                <h2 class="text-primary"><b>Manage Orders</b></h2>
                <hr width="600px"><br>
            </center>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client ID</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Date Order</th>
                                <th scope="col">Products ==> Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) {
                                $orderProducts = $orderHasProductModel->getOrderHasProductByOrderId($order['id']);
                                $user = $userModel->getUserById($order['user_id']);

                                // Check if user details are available
                                $userName = $user !== false ? $user['fname'] . " " . $user['lname'] : 'Unknown User';
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $order['id']; ?></th>
                                    <td><?php echo $order['user_id']; ?></td>
                                    <td><?php echo $userName; ?></td>
                                    <td><?php echo $order['order_date']; ?></td>
                                    <td>
                                        <?php foreach ($orderProducts as $op) {
                                            $product = $productModel->getProductById($op['product_id']);
                                            if ($product !== false) {
                                                echo $product['name'] . " ==> <b>" . $op['qtty'] . "</b><br>";
                                            } else {
                                                echo "Unknown Product <br>";
                                            }
                                        } ?>
                                    </td>
                                    <td><?php echo $order['total']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

</body>

</html>