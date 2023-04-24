<?php
abstract class productModel extends Database
{
    abstract protected function getProducts();
    abstract protected function addProduct($sku, $names, $price, $types, $details);
}


class Product extends productModel
{
    protected function getProducts()
    {
        //create query
        $sql = 'SELECT * FROM products';

        //prepered statement
        $stmt = $this->connect()->query($sql);
     
        return $stmt;
    }


    protected function addProduct($sku, $names, $price, $types, $details)
    {
        $sql = "INSERT INTO products (sku, names, price, types, details) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('sssss', $sku, $names, $price, $types, $details);

        if ($stmt->execute()) {
            echo json_encode(array('message'=>'product created successfuly'));
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        

    }
}
