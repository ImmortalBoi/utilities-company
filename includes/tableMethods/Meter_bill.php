<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postMeterBill($meter_id, $bill_id, $cost){
    try {
        require("../connect.php");
        $conn = connectToDB();
        $sql = "INSERT INTO `utilities_company_DB`.`Meter_BIll` (`Meter_ID`, `Bill_ID`, `Cost`) VALUES (NULL, '".$meter_id."', '".$bill_id."', '".$cost."') ";

        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into Usertype: ". $conn->error;
        http_response_code(400);
    }
}

function getMeterBill($conn){
    $sql = "SELECT `
    FROM `utilities_company_DB`.`Meter`
    WHERE `utilities_company_DB`.`Meter_ID` IN (SELECT `Bill_ID`
                FROM `utilities_company_DB`.`Utility_bill`
                WHERE `paid_status`= false)";

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