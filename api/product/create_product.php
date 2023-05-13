<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/details.model.php');
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
$size = isset($data['size']) ? $data['size'] : "";
$weight = isset($data['weight']) ? $data['weight'] : "";
$height = isset($data['height']) ? $data['height'] : "";
$width = isset($data['width']) ? $data['width'] : "";
$length = isset($data['length']) ? $data['length'] : "";
$details = "";

$typeController = new Details($size, $weight, $height, $width, $length);

$details = $typeController->getDetails(new $types());

$product = new ProductContr($sku, $names, $price, $types, $details);

$product->createProduct();
