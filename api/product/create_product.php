<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/productController.php');

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents('php://input'), true);

$sku = $data['sku'];
$names = $data['names'];
$price = $data['price'];
$types = $data['types'];
$details = $data['details'];

$product = new productContr($sku, $names, $price, $types, $details);
$product->createProduct();