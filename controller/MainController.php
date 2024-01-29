<?php

require_once 'ContactsController.php';
require_once 'ProductsController.php';

class MainController {

    function __construct()
    {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
    }

    public function handleRequest() {
        try {
            $act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
            switch ($act) {
                  case 'contacts':
                    $this->ContactsController->handleRequest();
                    break;
                    case 'products':
                        $this->ProductsController->handleRequest();
                    break;
                default:
                    $this->ProductsController->handleRequest();
                    break;
                }
            }catch (Exception $e) {
                throw $e;
            }
        }
}