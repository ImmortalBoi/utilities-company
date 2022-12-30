<?php
require __DIR__.'/includes/connect.php';
require __DIR__.'/includes/tableMethods/User.php';
require __DIR__.'/includes/tableMethods/Usertype.php';
require __DIR__.'/includes/tableMethods/Location.php';
require __DIR__.'/includes/tableMethods/Department.php';

$request = $_SERVER['REQUEST_URI'];
$conn = connectToDB();


switch ($request) {
    case '/' :
        $resultUsers = getUsers($conn);
        $resultLocations = getLocations($conn);
        $resultCostumerTypes = getCustomertypes($conn);
        $resultEmployeeTypes = getEmployeetypes($conn);
        require __DIR__ . '/views/Employee/Dashboard.php';
        break;
    case '' :
        $resultUsers = getUsers($conn);
        $resultLocations = getLocations($conn);
        require __DIR__ . '/views/Employee/Dashboard.php';
        break;

    case '/user':
        $resultUsers = getUsers($conn);
        $resultUsertypes = getUsertypes($conn);
        $resultLocations = getLocations($conn);
        $resultDepartments = getDepartments($conn);
        require __DIR__ . '/views/Employee/Data.php';
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