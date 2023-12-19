<?php
include "./includes/Header.php";

$productModel = new Product();

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $productModel->deleteProductById($deleteId);
    header("Location: ManageProducts.php");
    exit();
}

$products = $productModel->getAllProducts();
?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h3 class="mb-3" style="margin-top: 2%;">Manage Products</h3>
                    </center>
                    <hr>
                    <div class="mb-3">
                        <center>
                            <a href="AddProduct.php" class="btn btn-success">Add new Product</a>
                        </center>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Img</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <th scope="row"><?php echo $product['id']; ?></th>
                                    <td><img src="<?php echo $product['url_img']; ?>" width="50" height="50" alt=""></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $product['qtty']; ?></td>
                                    <td><?php echo $product['description']; ?></td>
                                    <td>
                                        <a href="./ModifyProduct.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="./ManageProducts.php?delete_id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
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