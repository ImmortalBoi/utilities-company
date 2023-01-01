<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function postUser($name, $email, $address, $password){
    try {
        if (!isset($conn)) {
            require "../connect.php";
            $conn = connectToDB();
        }
        $sql = "INSERT INTO `utilities_company_DB`.`User` (`User_ID`, `Name`, `Email`, `Address`, `Password`) VALUES ( NULL, '".$name."', '".$email."', '".$address."', MD5('".$password."')) ";
    
        $conn->query($sql);
        http_response_code(200);
        echo '<script>window.location.href = "/";</script>';
    } catch (Exception $e) {
        echo "Error inserting into User: ". $conn->error;
        http_response_code(400);
    }
}
function postUserDB($name, $email, $address, $password){
    try {
        if (!isset($conn)) {
            // require "../connect.php";
            $conn = connectToDB();
        }
        $sql = "INSERT INTO `utilities_company_DB`.`User` (`User_ID`, `Name`, `Email`, `Address`, `Password`) VALUES ( NULL, '".$name."', '".$email."', '".$address."', MD5('".$password."')) ";
    
        $conn->query($sql);
        http_response_code(200);
        // echo '<script>window.location.href = "/";</script>';
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

function updateUser($conn,$user_id,$name,$email,$address,$password){
    $password = md5($password);
    $sql="UPDATE `utilities_company_DB`.`User` 
    SET `User_ID`='$user_id',`Name`='$name',`Email`='$email',`Address`='$address',`Password`='$password'
    WHERE `User_ID`= '$user_id';";
    try {
        $result = $conn->query($sql);
        header("location: /");

    } catch (Exception $e) {
        echo "Error updating Customers: ". $conn->error;
    }
}

function deleteUser($conn,$user_id){
    require "../connect.php";
    $conn = connectToDB();
    $sql = "DELETE FROM `utilities_company_DB`.`User` 
    WHERE `User_ID`= '$user_id';";
    try {
        $conn->query($sql);
        header("location: /");

    } catch (Exception $e) {
        echo "Error deleting Customers: ". $conn->error;
    }
}
// function getUserID($conn,$id){

// }


switch ($method) {
    case 'PUT':
        break;
    case 'POST':
        if($_POST['method']==="delete"){
            deleteUser($conn,$_POST['user_id']);
            header("location: /user");
        }
        postUser($_POST['name'], $_POST['email'], $_POST['address'], $_POST['password']);
        break;
    case 'GET':
        break;
    default:
        break;
}

?>