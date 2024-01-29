<?php

require_once 'model/ProductsLogic.php';
require_once 'model/Output.php';

class ProductsController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
        $this->Output = new Output();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            switch ($op) {
                case 'create':
                    $this->collectCreateProduct();
                    break;
                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;
                case 'reads':
                    $this->CollectReadPagedProducts($_REQUEST['page']);
                    break;
                case 'update':
                    $this->collectUpdateProduct($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearchProduct();
                    break;
                default:
                    $this->CollectReadPagedproducts(1);
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function collectReadAllProducts($p = 1)
    {
        $products = $this->ProductsLogic->readAllProducts();
        $id_colum_name = "product_id";
        $act = "products";
        $result = $this->Output->createTable($products, $act, $id_colum_name);
        include 'view/ListProducts.php';
    }

    public function collectCreateProduct()
    {
        $msg = "";
        if (isset($_REQUEST['submit'])) {
            $type = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : null;
            $supplier = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : null;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $price  = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $details  = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

            $products = $this->ProductsLogic->createProduct($type, $supplier, $product_name, $price, $details);

            if ($products > null) {
                $msg .= "Er is een fout opgetreden bij het toevoegen van het product";
            } else {
                $msg .= "Product toegevoegd";
            }
        }
        include 'view/createProduct.php';
    }

    public function collectReadProduct($id)
    {
        $products = $this->ProductsLogic->readProduct($id);
        $products = $products->fetch(PDO::FETCH_ASSOC);
        include 'view/product.php';
    }

    public function collectUpdateProduct($product_id)
    {
        $msg = "";
        $type = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : null;
        $supplier = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : null;
        $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
        $price  = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
        $details  = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

        if (isset($_REQUEST['submit'])) {
            $products = $this->ProductsLogic->updateProduct($product_id, $type,  $supplier, $product_name, $price, $details);

            if ($products) {
                $msg .= "Product has been edited";
            } else {
                $msg .= "Product has not been edited";
            }
        }

        $products = $this->ProductsLogic->readProduct($product_id);
        $res = $products->fetch(PDO::FETCH_NUM);
        [$product_id, $type, $supplier, $product_name, $price, $details] = $res;

        $operation = "?act=products&op=update&id=$product_id";
        include 'view/updateProduct.php';
    }

    public function collectDeleteProduct($product_id)
    {
        $msg = "";
        $products = $this->ProductsLogic->deleteProduct($product_id);
        include 'view/deleteProduct.php';
    }

    public function collectSearchProduct()
    {
        if (isset($_REQUEST['submit'])) {
            $search = $_POST['search'];
        }
        $products = $this->ProductsLogic->searchProducts($search);
        $id_colum_name = "product_id";
        $act = "products";
        $result = $this->Output->createTable($products, $act, $id_colum_name);
        include 'view/searchProducts.php';
    }

    public function CollectReadPagedProducts($p)
    {
        $res = $this->ProductsLogic->readAllProducts($p);
        $products = $this->Output->createTable($res[0], 'products', 'product_id');
        $pages = $res[1];
        $pagebuttons = $this->Output->createButtons($pages, 'products');
        $msg = "<div class='msg'>Showing page {$p} of all products</div>";
        include 'view/listProducts.php';
    }
}
