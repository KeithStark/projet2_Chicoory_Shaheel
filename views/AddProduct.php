<?php
include "./includes/Header.php";
include "../models/Product.php";

// Assuming you have a function to handle the form submission, you can add it here.
// For example:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
    // Handle the form data, e.g., validate and add the product.
    $productData = array(
        'name' => $_POST['name'],
        'qtty' => $_POST['quant'],
        'price' => $_POST['price'],
        'url_img' => $_POST['url_img'],
        'description' => $_POST['description'],
    );

    $productModel = new Product();
    $productModel->addProduct($productData);

    header("Location: manageProducts.php");
    exit();
}
?>

<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                        <h3 class="mb-3" style="margin-top: 2%;">Add New Product</h3>
                        </center>
                        <hr>
                        <div class="registerfrm">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Price</b></label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Product Price" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quant"><b>Quantity</b></label>
                                    <input type="number" class="form-control" name="quant" id="quant" min="0">
                                </div>
                                <div class="mb-3">
                                    <label for="quant"><b>URL Product Image</b></label>
                                    <input type="text" class="form-control" name="url_img" id="url_img">
                                </div>
                                <div class="mb-3">
                                    <label for="description"><b>Description</b></label>
                                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                                </div>
                                <center>
                                    <div class="mb-3">
                                        <input type="submit" name="save" value="Add Product" class="btn btn-success">
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