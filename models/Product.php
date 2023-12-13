<?php

require_once('./models/Crud.php');

class Product extends Crud
{
    protected $id;
    protected $name;
    protected $qtty;
    protected $price;
    protected $url_img;
    protected $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts()
    {
        return $this->getAll('product');
    }

    public function getProductById($id)
    {
        return $this->getById('product', $id);
    }

    public function addProduct($productData)
    {
        return $this->add('product', $productData);
    }

    public function updateProductById($id, $productData)
    {
        return $this->updateById('product', $id, $productData);
    }

    public function deleteProductById($id)
    {
        return $this->deleteById('product', $id);
    }
}
