<?php
include "./includes/Header.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productModel = new Product();
    $product = $productModel->getProductById($id);

    // Assuming you have a function to handle the form submission, you can add it here.
    // For example:
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
        // Handle the form data, e.g., validate and modify the product.
        $productData = array(
            'name' => $_POST['name'],
            'qtty' => $_POST['quant'],
            'price' => $_POST['price'],
            'url_img' => $_POST['url_img'],
            'description' => $_POST['description'],
        );

        $productModel->updateProductById($id, $productData);

        header("Location: manageProducts.php");
        exit();
    }
}
?>

<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Modify Product</h4>
                        </center>
                        <hr>
                        <div class="registerfrm">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $product['name']; ?>" placeholder="Product Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Price</b></label>
                                    <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>" placeholder="Product Price" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quant"><b>Quantity</b></label>
                                    <input type="number" class="form-control" name="quant" id="quant" value="<?php echo $product['qtty']; ?>" min="0">
                                </div>
                                <div class="mb-3">
                                    <label for="url_img"><b>URL Product Image</b></label>
                                    <input type="text" class="form-control" name="url_img" id="url_img" value="<?php echo $product['url_img']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description"><b>Description</b></label>
                                    <textarea class="form-control" name="description" id="description" rows="5"><?php echo $product['description']; ?></textarea>
                                </div>
                                <center>
                                    <div class="mb-3">
                                        <a href="./ManageProducts.php" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" name="save" value="Modify Product" class="btn btn-primary">
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include "./includes/Footer.php";
?>