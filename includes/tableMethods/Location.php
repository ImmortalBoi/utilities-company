<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postLocation($area, $address){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Location` (`Loc_ID`, `Area`, `Address`) VALUES ( NULL, '".$area."', '".$address."')";
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Location: ". $conn->error;
        http_response_code(400);
    }
}

function getLocations($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Location` ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Location: ". $conn->error;
    }
}

// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        postLocation($_POST['area'], $_POST['address']);  
        break;
    case 'GET':
        // do_something_with_get($request);  
        break;
    default:
        // handle_error($request);  
        break;
}

?>