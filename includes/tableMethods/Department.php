<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postDepartment($loc_id, $name, $type){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Department` (`Dep_ID`, `SupEmp_ID`, `Loc_ID`, `Name`, `Type`) VALUES (NULL, '".$loc_id."', '".$name."', '".$type."') ";

        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Usertype: ". $conn->error;
        http_response_code(400);
    }
}

function getDepartments($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Location` ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Usertypes: ". $conn->error;
    }
}

// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        postDepartment(explode(" ",$_POST['loc_id'])[0],$_POST['name'], $_POST['type']);  
        break;
    case 'GET':
        // do_something_with_get($request);  
        break;
    default:
        // handle_error($request);  
        break;
}

?>