<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postUser($loc_id, $demand_min, $fuel_needed){
    try {
        if (!isset($conn)) {
            $conn = connectToDB();
        }
        $sql = "INSERT INTO `utilities_company_DB`.`Generator` (`Gen_ID`, `Loc_ID`, `Demand_min`, `Fuel_needed`) VALUES ( NULL, '".$loc_id."', '".$demand_min."', '".$fuel_needed."') ";
    
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Generator: ". $conn->error;
        http_response_code(400);
    }
}

function getUsers($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Generator` ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Generators: ". $conn->error;
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