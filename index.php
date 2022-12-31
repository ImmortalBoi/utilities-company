<?php
session_start();
require __DIR__.'/includes/connect.php';

$request = $_SERVER['REQUEST_URI'];
$conn = connectToDB();

switch ($request) {
    case '/' :
        require __DIR__ . '/views/login.php';
        break;
    case '' :
        require __DIR__ . '/views/login.php';
        break;
    
    case '/validate':
        require __DIR__ . '/includes/validate.php';
        break;
    
    case '/dashboard':


        if (!isset($_SESSION['user'])) {
            echo "User ID Not set";
            echo $_SESSION['user'];
            require __DIR__ . '/views/login.php';
        }

        if ($_SESSION['type'] === "Employee") {
            require __DIR__.'/includes/tableMethods/User.php';
            require __DIR__.'/includes/tableMethods/Usertype.php';
            require __DIR__.'/includes/tableMethods/Location.php';
            require __DIR__.'/includes/tableMethods/Department.php';
            require __DIR__.'/includes/tableMethods/Employee.php';
            require __DIR__.'/includes/tableMethods/Customer.php';
            
            $resultUsers = getUsers($conn);
            $resultLocations = getLocations($conn);
            $resultDepartments = getDepartments($conn);
            $resultCustomerTypes = getCustomertypes($conn);
            $resultEmployeeTypes = getEmployeetypes($conn);
            require __DIR__ . '/views/Employee/Dashboard.php';
        }
        else {
            require __DIR__ . '/views/Customer/Dashboard.php';
        }

        break;
    case '/user':
        require __DIR__.'/includes/tableMethods/User.php';
        require __DIR__.'/includes/tableMethods/Usertype.php';
        require __DIR__.'/includes/tableMethods/Location.php';
        require __DIR__.'/includes/tableMethods/Department.php';
        require __DIR__.'/includes/tableMethods/Employee.php';
        require __DIR__.'/includes/tableMethods/Customer.php';

        if (!isset($_SESSION['user'])) {
            require __DIR__ . '/views/login.php';
        }
        if ($_SESSION['type'] === "Employee") {
            $resultUsers = getUsers($conn);
            $resultUsertypes = getUsertypes($conn);
            $resultLocations = getLocations($conn);
            $resultDepartments = getDepartments($conn);
            $resultCustomers = getCustomers($conn);
            $resultEmployees = getEmployees($conn);
            require __DIR__ . '/views/Employee/Dashboard.php';
        }
        else {
            require __DIR__ . '/views/Customer/Dashboard.php';
        }
        break;

    case '/dbReset':
        require __DIR__ . '/views/dbReset.php';
        break;

    case '/about' :
        require __DIR__ . '/views/about.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}