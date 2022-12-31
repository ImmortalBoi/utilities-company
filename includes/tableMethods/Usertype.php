<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postUsertype($user_id, $type){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Usertype` (`User_ID`, `Type`) VALUES ('".$user_id."', '".$type."')";

        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Usertype: ". $conn->error;
        http_response_code(400);
    }
}

function getUsertypes($conn){
    $sql = "SELECT * FROM `utilities_company_DB`.`Usertype` ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Usertypes: ". $conn->error;
    }
}

function getCustomertypes($conn){
    $sql = "SELECT `Usertype`.`User_ID`, `User`.`Name`, `Usertype`.`Type` 
    FROM `utilities_company_DB`.`Usertype`
    INNER JOIN `utilities_company_DB`.`User` ON `utilities_company_DB`.`Usertype`.`User_ID` = `User`.`User_ID`
    WHERE `Type` = 'Customer';";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Customer Usertypes: ". $conn->error;
    }
}

function getEmployeetypes($conn){
    $sql = "SELECT `Usertype`.`User_ID`, `User`.`Name`, `Usertype`.`Type` 
    FROM `utilities_company_DB`.`Usertype`
    INNER JOIN `utilities_company_DB`.`User` ON `utilities_company_DB`.`Usertype`.`User_ID` = `User`.`User_ID`
    WHERE `Type` = 'Employee';";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Employee Usertypes: ". $conn->error;
    }
}


// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        postUsertype(explode(" ",$_POST['User_id'])[0], $_POST['Type']);  
        break;
    case 'GET':
        // do_something_with_get($request);  
        break;
    default:
        // handle_error($request);  
        break;
}

?>