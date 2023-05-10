<?php
abstract class productModel extends Database
{
    abstract protected function getProducts();
    abstract protected function addProduct($sku, $names, $price, $types, $details);
    abstract protected function delete($ids);
}
class Product extends productModel
{
    protected function getProducts()
    {
        //create query
        $sql = 'SELECT * FROM products ORDER BY id DESC';
        //prepered statement
        $stmt = $this->connect()->query($sql);

        return $stmt;
    }

    public function getSku($sku)
    {
        // $sql = "SELECT * FROM products WHERE sku = '$sku'";
        $sql = "SELECT id FROM products WHERE sku = '$sku'";
        $smt = $this->connect()->query($sql);

        if (mysqli_num_rows($smt) > 0) {
            $response = array('isUnique' => false);
        } else {
            $response = array('isUnique' => true);
        }
        echo json_encode($response);
    }

    protected function addProduct($sku, $names, $price, $types, $details)
    {
        $sql = "INSERT INTO products (sku, names, price, types, details) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('sssss', $sku, $names, $price, $types, $details);

        if ($stmt->execute()) {
            echo json_encode(array('message' => 'product created successfuly', 'status' => 200));
        } else {
            echo json_encode(array("error" => $stmt->error));
        }
        $stmt->close();
    }

    protected function delete($sql)
    {
        $this->connect()->query($sql);
    }
}
