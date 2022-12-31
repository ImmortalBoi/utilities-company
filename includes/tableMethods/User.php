<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postUser($name, $email, $address, $password){
    try {
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`User` (`User_ID`, `Name`, `Email`, `Address`, `Password`) VALUES ( NULL, '".$name."', '".$email."', '".$address."', MD5('".$password."')) ";
    
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into User: ". $conn->error;
        http_response_code(400);
    }
}

function getUsers($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`User` ";
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
        postUser($_POST['name'], $_POST['email'], $_POST['address'], $_POST['password']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>