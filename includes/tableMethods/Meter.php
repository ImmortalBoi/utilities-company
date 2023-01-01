<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postMeter($user_id, $type, $max_load){
    try {
        if (!isset($conn)) {
            $conn = connectToDB();
        }
        $sql = "INSERT INTO `utilities_company_DB`.`Meter` (`Meter_ID`, `User_ID`, `Type`, `Max_load`) VALUES ( NULL, '".$user_id."', '".$type."', '".$max_load."') ";
    
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Meter: ". $conn->error;
        http_response_code(400);
    }
}

function getUsers($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Meter` ";
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
        postMeter($_POST['user_id'], $_POST['type'], $_POST['max_load']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>