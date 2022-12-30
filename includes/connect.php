<?php
function connectToDB(){
    $servername = "localhost";
    $username = "root";
    $password = "Warrior0";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>