<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../view/productView.php');


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

 $view_product = new productView();

 $view_product->showProduct();


