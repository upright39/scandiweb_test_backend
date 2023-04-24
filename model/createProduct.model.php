<?php

  class productContr extends Product{
 
    private $sku;
    private $names;
    private $price;
    private $types;
    private $details;

    
    public function __construct($sku, $names, $price, $types, $details)
    {
        $this->sku = $sku;
        $this->names = $names;
        $this->price = $price;
        $this->types = $types;
        $this->details = $details;
    }
  
    public function  createProduct(){   
      $this->addProduct($this->sani($this->sku), $this->sani($this->names), $this->sani($this->price), $this->sani($this->types), $this->sani($this->details));
    }
   
    private function sani($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    }