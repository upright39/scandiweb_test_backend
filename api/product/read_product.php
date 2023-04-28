<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/productController.model.php');


 //instanciate viewProduct object
 $view_product = new productContr("","","","","");

 $view_product->showProduct();


