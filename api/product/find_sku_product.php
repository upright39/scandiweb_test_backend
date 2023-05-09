<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../veiw/productView.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

 $sku = $_GET['sku'];

 //instanciate viewProduct object
 $view_product = new productView();

 $view_product->getSingleSkuProduct($sku); 