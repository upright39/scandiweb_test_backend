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



  public function showProduct()

  {

    $result = $this->getProducts();

    if ($result->num_rows > 0) {
      //post ar$reray
      $posts_arr = array();
      $posts_arr['data'] = array();

      while ($row = $result->fetch_assoc()) {
        extract($row);
        $product_item = array(
          'id' => $id,
          'sku' => $sku,
          'names' => $names,
          'price' => $price,
          'types' => $types,
          'details' => $details,
        );

        //push to "data"
        array_push($posts_arr['data'], $product_item);
      }

      //convert to json & output data.
      echo json_encode($posts_arr);
    } else {
      //no post
      echo json_encode(
        array('message' => 'No Post Found')
      );
    }
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
