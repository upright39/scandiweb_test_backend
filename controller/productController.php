<?php
class productContr extends Product
{
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

  public function  createProduct()
  {
    $this->addProduct($this->sani($this->sku), $this->sani($this->names), $this->sani($this->price), $this->sani($this->types), $this->sani($this->details));
  }

  public function deleteSelectedProducts($ids)
  {
    // Construct the SQL query to delete the selected items from the database
    $sql = "DELETE FROM products WHERE id IN (" . implode(",", $ids) . ")";

    $stmt = $this->delete($sql);

    // Execute the query
    if (isset($stmt)) {
      echo json_encode(['message' => 'Items deleted successfully.']);
    } else {
      echo json_encode(['error' => 'Failed to delete items from the database.']);
    }
  }
   
  private function sani($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
