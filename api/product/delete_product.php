<?php
include_once('../../databaseConfig/Database.class.php');
include_once('../../model/product.model.php');
include_once('../../model/details.model.php');
include_once('../../veiw/productView.php');
include_once('../../controller/productController.php');

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: DELETE');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    // Get the selected item IDs from the request body
    $data = json_decode(file_get_contents("php://input"));
    $ids = $data->ids;

    $delete = new productContr("", "", "", "", "");
    $delete->deleteSelectedProductS($ids);
}
