<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/productController.model.php');
include_once('../../model/details.model.php');
include_once('../../model/validate.php');

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents('php://input'), true);

$sku = $data['sku'] ?? '';
$names = $data['names'] ?? '';
$price = $data['price'] ?? '';
$types = $data['types'] ?? '';
$size = $data['size'] ?? '';
$weight = $data['weight'] ?? '';
$height = $data['height'] ?? '';
$width = $data['width'] ?? '';
$length = $data['length'] ?? '';
$details = "";

$validator = new ProductValidator();

$validator->validateSku($sku);
$validator->validateName($names);
$validator->validatePrice($price);
$validator->validateTypes($types);

if ($types === 'DVD') {
        $validator->validateSize($size);
} elseif ($types === 'Book') {
        $validator->validateWeight($weight);
} elseif ($types === 'Furniture') {
        $validator->validateHeight($height);
        $validator->validateWidth($width);
        $validator->validateLength($length);
} else {

        null;
}

if ($validator->hasErrors()) {
        $response = array('status' => 'error', 'errors' => $validator->getErrors());
        echo json_encode($response);
        exit;
}

$typeController = new Mydetails($size, $weight, $height, $width, $length);
$details = $typeController->checkDetails();


$product = new productContr($sku, $names, $price, $types, $details);
$product->createProduct();
