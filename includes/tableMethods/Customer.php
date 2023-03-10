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
        echo "Error inserting into Customer: ". $conn->error;
        echo $sql;
        http_response_code(400);
    }
}

function getCustomers($conn){
    $sql = "SELECT `utilities_company_DB`.`Customer`.`User_ID`,`utilities_company_DB`.`User`.`Name`, `utilities_company_DB`.`Customer`.`Service_voltage`, `utilities_company_DB`.`Customer`.`Rate`, `utilities_company_DB`.`Customer`.`Service_character`, `utilities_company_DB`.`Customer`.`Benefits` 
    FROM `utilities_company_DB`.`Customer`
    INNER JOIN `utilities_company_DB`.`User` ON `utilities_company_DB`.`User`.`User_ID` = `utilities_company_DB`.`Customer`.`User_ID` 
    ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Customers: ". $conn->error;
    }
}
function getCustomer($conn,$id){
    $sql = "SELECT `utilities_company_DB`.`Customer`.`User_ID`,`utilities_company_DB`.`User`.`Name`, `utilities_company_DB`.`Customer`.`Service_voltage`, `utilities_company_DB`.`Customer`.`Rate`, `utilities_company_DB`.`Customer`.`Service_character`, `utilities_company_DB`.`Customer`.`Benefits` 
    FROM `utilities_company_DB`.`Customer`
    INNER JOIN `utilities_company_DB`.`User` ON `utilities_company_DB`.`User`.`User_ID` = `utilities_company_DB`.`Customer`.`User_ID` 
    WHERE `utilities_company_DB`.`User`.`User_ID` = '$id';
    ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Customer: ". $conn->error;
    }
}

function updateCustomer($user_id,$service_voltage,$rate,$service_character,$benefits){
    require("../connect.php");
    $conn = connectToDB();
    
    $sql="UPDATE `utilities_company_DB`.`Customer` 
    SET `Service_voltage`='$service_voltage',`Rate`='$rate',`Service_character`='$service_character',`Benefits`='$benefits'
    WHERE `User_ID`= '$user_id';";
    echo $sql;
    try {
        $conn->query($sql);
        header("location: /");

    } catch (Exception $e) {
        echo "Error updating Customers: ". $conn->error;
    }
}
// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
    break;
    case 'POST':
        if($_POST['method']==="update"){
            updateCustomer($_POST['user_id'],$_POST['service_voltage'],$_POST['rate'],$_POST['service_character'],$_POST['benefits']);
            header("location: /user");
        }
        postCustomer(explode(" ",$_POST['user_id'])[0],$_POST['service_voltage'],$_POST['rate'],$_POST['service_character'],$_POST['benefits']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>