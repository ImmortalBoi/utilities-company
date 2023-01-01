<?php
require "./includes/dbCreation.php";
createDB($conn);
postUserDB("Admin","admin@admin.com","Admin Island","admin");
postUsertypeDB("1","Employee");
echo "Admin Created successfully";

$conn->close();
?> 