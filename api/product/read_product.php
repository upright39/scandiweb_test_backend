<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../config/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/viewProduct.model.php');


 //instanciate viewProduct object
 $view_product = new veiwProduct();
 
 $view_product->showProduct();


