<?php
include "./includes/Header.php";
require_once "../controllers/OrderController.php";
require_once "../models/UserOrder.php";
require_once "../models/OrderHasProduct.php";

$orderController = new OrderController();
$userOrderModel = new UserOrder();
$orderHasProductModel = new OrderHasProduct();


$orders = $userOrderModel->getAllUserOrders();
?>

<main>
    <section>
        <div class="container my-4">
            <h2 class="mb-4">Orders</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $order) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($order['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['user_id']) . "</td>"; // Adjust to show user details
                            echo "<td>" . htmlspecialchars($order['order_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['total']) . "</td>";
                            // Add more data as needed
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </section>
</main>
</body>

</html>