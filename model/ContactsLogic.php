<?php

require_once 'model/DataHandler.php';

class Contactslogic
    {
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function __destruct(){}

    public function createContact($name, $phone, $email, $address) {
        // Checkt of een form gesubmit is.
        if (empty($name) && empty($phone) && empty($email) && empty($address)) {
        } else {
            $sql = "INSERT INTO `contacts` (`name`, `phone`, `email`, `address`) VALUES ('" . $name . "', '" . $phone . "', '" . $email . "', '" . $address . "')";
            $contacts = $this->DataHandler->createData($sql);
        }
    }

    public function readContact($id){
        try {
            $sql = "SELECT * FROM contacts WHERE id = " . $id;
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllContacts(){
        try {
            $sql = "SELECT * FROM contacts";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateContact($id, $name, $phone, $email, $address)
    {
        try {
            $sql = "UPDATE contacts SET name = '$name', phone = '$phone', email = '$email', address = '$address' WHERE id = $id";
            $result = $this->DataHandler->updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteContact($id){
        try {
            $sql = "DELETE FROM contacts WHERE id = ". $id;
            $result = $this->DataHandler->deleteData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function readAllNames(){
        try {
            $sql = "SELECT name FROM contacts";
            $result = $this->DataHandler->readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
