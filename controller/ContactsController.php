<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Output.php';

class ContactsController
{
    public function __construct()
    {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();
    }
    public function __destruct() {}
    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : '';
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            switch ($op) {
                case 'create':
                  $this->collectCreateContact();
                  break;
                case 'read':
                  $this->collectReadContact($_REQUEST['id']);
                  break;
                case 'update':
                  $this->collectUpdateContact($_REQUEST['id']);
                  break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                default:
                    $this->collectReadAllContacts();
                    break;
                }
            }catch (Exception $e) {
                throw $e;
            }
        }
        public function collectReadAllContacts(){
            $contacts = $this->ContactsLogic->readAllContacts();
            $act = "contacts";
            $result = $this->Output->createTable($contacts, $act);
            $select = $this->ContactsLogic->readAllNames();
            $selectResult = $this->Output->createSelect($select);
            include 'view/listContacts.php';
        }

        public function collectCreateContact() {
            $msg = "";
            if (isset($_REQUEST['submit'])) {
                $name = isset($_REQUEST['name'])? $_REQUEST['name'] :null;
                $phone = isset($_REQUEST['phone'])? $_REQUEST['phone'] :null;
                $email = isset($_REQUEST['email'])? $_REQUEST['email'] :null;
                $address  = isset($_REQUEST['address'])? $_REQUEST['address'] :null;

                $contacts = $this->ContactsLogic->createContact($name, $phone, $email, $address);

                if ($contacts > null) {
                    $msg .= "Er is een fout opgetreden bij het toevoegen van het contact";
                } else {
                    $msg .= "Contact toegevoegd";
                }
            }
            include 'view/create.php';
        }

        public function collectReadContact($id) {
            $contacts = $this->ContactsLogic->readContact($id);
            $act = "";
            $id_colum_name = "";
            $result = $this->Output->createTable($contacts, $act, $id_colum_name);
            include 'view/read.php';
        }

        public function collectUpdateContact($id) {
            $id = isset($_REQUEST['id'])? $_REQUEST['id'] :null;
            $name = isset($_REQUEST['name'])? $_REQUEST['name'] :null;
            $phone = isset($_REQUEST['phone'])? $_REQUEST['phone'] :null;
            $email = isset($_REQUEST['email'])? $_REQUEST['email'] :null;
            $address  = isset($_REQUEST['address'])? $_REQUEST['address'] :null;

            if (isset($_REQUEST['submit'])){

                $contacts = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $address);

                $this->collectUpdateContact($id);
            }

            $contacts = $this->ContactsLogic->readContact($id);
            $res = $contacts->fetch(PDO::FETCH_NUM);
            [$id, $name, $phone, $email, $address] = $res;

            $msg = "Contact has been edited";
            $operation = "update=$id";
            include 'view/update.php';
        }

        public function collectDeleteContact($id){
            $msg = "";
            $contacts = $this->ContactsLogic->deleteContact($id);
            $msg .= "Contact Verwijderd";
            include 'view/delete.php';
        }
    }

?>