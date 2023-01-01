<?php
    function getUsertype($conn,$id){
        $sql = "SELECT `Usertype`.`Type`
        FROM `utilities_company_DB`.`Usertype`
        WHERE `User_ID` = $id";
        try {
            $result = $conn->query($sql)->fetch_assoc();
            return $result['Type'];
        } catch (Exception $e) {
            echo "Error getting Employee Usertypes: ". $conn->error;
        }
    }
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT `User_ID`, `Name`, `Email`, `Address`, `Password` 
    FROM `utilities_company_DB`.`User` 
    WHERE `Email`='$email' AND `Password` = '$password';";
    echo $sql;
    $validate = $conn->query($sql);
    if ($validate->num_rows > 0) {
        echo 'Validated';
        $row = $validate->fetch_assoc();
        $User_ID = $row['User_ID'];
        $User_type = getUsertype($conn,$row['User_ID']);
        $_SESSION['user'] = $User_ID;
        $_SESSION['type'] = $User_type;
        echo $User_type;
        // echo $_SESSION['user'];
        // echo $_SESSION['type'];
        
        header('Location:/dashboard  ');
        // echo '<script>window.location.href = "/dashboard";</script>';
    }
    else{
        echo 'Wrong';
    }
?>