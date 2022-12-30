<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postCustomer($user_id, $service_voltage, $rate, $service_character, $benefits){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Customer` (`User_ID`, `Service_voltage`, `Rate`, `Service_character`, `Benefits`) VALUES ('$user_id', '$service_voltage', '$rate', '$service_character', '$benefits') ";
    
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into User: ". $conn->error;
        http_response_code(400);
    }
}

function getCustomer($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Customer` ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Users: ". $conn->error;
    }
}

// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        postCustomer($_POST['user_id'],$_POST['service_voltage'],$_POST['rate'],$_POST['service_character'],$_POST['benefits']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>