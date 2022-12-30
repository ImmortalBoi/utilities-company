<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postEmployee($user_id, $dep_id, $title, $salary, $ssn){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Employee` (`User_ID`, `Dep_ID`, `Title`, `Salary`, `SSN`) VALUES ('$user_id', '$dep_id', '$title', '$salary', '$ssn') ";
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into User: ". $conn->error;
        http_response_code(400);
    }
}

function getEmployee($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Employee` ";
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