<?php

require_once 'model/DataHandler.php';

class ProductsLogic
    {
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function __destruct(){}

    public function createProduct($type, $supplier, $product_name, $price, $details) {
        // Checkt of een form gesubmit is.
        if (empty($type) && empty($supplier) && empty($product_name) && empty($price) && empty($details)) {
        } else {
            $sql = "INSERT INTO `products` (`product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES ('" . $type . "', '" . $supplier . "', '" . $product_name . "', '" . $price . "', '" . $details . "')";
            $products = $this->DataHandler->createData($sql);
        }
    }

    public function readProduct($product_id) {
        try {
            $sql = "SELECT * FROM Products WHERE product_id = " . $product_id;
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllProducts($p = 1) {
        try {
            $item_per_page = 5;
            $position = (($p -1) * $item_per_page);
            $sql = "SELECT * FROM `products` LIMIT  $position, $item_per_page";
            $result = $this->DataHandler->readsData($sql);
            $pages = $this->DataHandler->readsData('SELECT COUNT(*) FROM products');
            $pages = $pages->fetch(PDO::FETCH_NUM);
            return array($result, $pages);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateProduct($product_id, $type,  $supplier, $product_name, $price, $details) {
        try {
            $sql = "UPDATE Products SET product_type_code = '" . $type . "', supplier_id = '" . $supplier . "', product_name = '" . $product_name . "', product_price = '" . $price . "', other_product_details = '" . $details . "' WHERE product_id = " . $product_id;
            $result = $this->DataHandler->updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteProduct($product_id) {
        try {
            $sql = "DELETE FROM Products WHERE product_id = ". $product_id;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    // public function readAllProduct(){
    //     try {
    //         $sql = "SELECT Product_id FROM products";
    //         $result = $this->DataHandler->readsData($sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         throw $e;
    //     }
    // }

    public function searchProducts($search) {
        try{
            $sql = "SELECT * FROM Products WHERE product_name LIKE '%$search% ' OR other_product_details LIKE '%$search%'";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllProduct() {
        try {
            $sql = "SELECT * FROM `products`";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
