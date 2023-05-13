<?php
class productView extends Product
{

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

  public function getSingleSkuProduct($sku)
  {
    $smt = $this->getSku($sku);
    return $smt;
  }
}
