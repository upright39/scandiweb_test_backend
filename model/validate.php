<?php

class ProductValidator extends Database
{
    
    private $errors = array();
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }

    public function validateSku($sku)
    {
        if (empty($sku) || !preg_match('/^[a-zA-Z0-9]+$/', $sku)) {
            $this->errors['sku'] = 'Please enter a valid SKU';
        } else {
            $sku = mysqli_real_escape_string($this->conn, $sku);
            $query = "SELECT * FROM products WHERE sku = '$sku'";
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $this->errors['sku'] = 'SKU already exists must be unique';
            }
        }
    }

    public function validateName($names)
    {
        if (empty($names) || !preg_match('/^[a-zA-Z0-9\s]+$/', $names)) {
            $this->errors['names'] = 'Please enter a valid name';
        }
    }

    public function validateTypes($types)
    {
        if (empty($types) || !preg_match('/^[a-zA-Z0-9\s]+$/', $types)) {
            $this->errors['types'] = 'Please enter a valid type';
        }
    }

    public function validatePrice($price)
    {
        if (empty($price) || !preg_match('/^[a-zA-Z0-9\s]+$/', $price)) {
            $this->errors['price'] = 'Please enter a valid price';
        }
    }

    public function validateHeight($height)
    {
        if (empty($height) || !preg_match('/^[a-zA-Z0-9\s]+$/', $height)) {
            $this->errors['height'] = 'Please enter a valid height';
        }
    }

    public function validateWidth($width)
    {
        if (empty($width) || !preg_match('/^[a-zA-Z0-9\s]+$/', $width)) {
            $this->errors['width'] = 'Please enter a valid width';
        }
    }
    public function validateWeight($weight)
    {
        if (empty($weight) || !preg_match('/^[a-zA-Z0-9\s]+$/', $weight)) {
            $this->errors['weight'] = 'Please enter a valid weight';
        }
    }
    public function validateSize($size)
    {   
        if (empty($size) || !preg_match('/^[a-zA-Z0-9\s]+$/', $size) ) {
            $this->errors['size'] = 'Please enter a valid size';
        }
    }
    public function validateLength($length)
    {
        if (empty($length) || !preg_match('/^[a-zA-Z0-9\s]+$/', $length)) {
            $this->errors['length'] = 'Please enter a valid length';
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }
}
