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
        echo "Error inserting into Employer: ". $conn->error;
        echo $sql;
        http_response_code(400);
    }
}

function getEmployees($conn){
    $sql = "SELECT `utilities_company_DB`.`Employee`.`User_ID`, `utilities_company_DB`.`Department`.`Name`, `utilities_company_DB`.`Employee`.`Title`, `utilities_company_DB`.`Employee`.`Salary`,`utilities_company_DB`.`Employee`.`SSN` 
    FROM `utilities_company_DB`.`Employee` 
    INNER JOIN `utilities_company_DB`.`Department` ON `utilities_company_DB`.`Department`.`Dep_ID` = `utilities_company_DB`.`Employee`.`Dep_ID`
    ";
    try {
        $result = $conn->query($sql);

        return $result;
    } catch (Exception $e) {
        echo "Error getting Employee: ". $conn->error;
    }
}

// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        postEmployee(explode(" ",$_POST['User_id'])[0],explode(" ",$_POST['dep_id'])[0],$_POST['title'],$_POST['salary'],$_POST['ssn']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>