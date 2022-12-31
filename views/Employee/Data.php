<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <aside class="w-64 h-full fixed" aria-label="Sidebar">
        <div class="overflow-y-auto h-full py-4 px-3 bg-gray-50 dark:bg-gray-800">
            <a href="/" class="flex items-center pl-2.5 mb-5">
                <i class="text-yellow-400 fa-solid fa-bolt"></i> <i class="dark:text-white pr-2 fa-solid fa-plug"></i>
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Utility Company</span>
            </a>
            <ul class="space-y-2">
                <li>
                    <a href="/" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                    <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                    </a>
                </li>
                <li>
                    <a href="/user" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="py-1 pl-1 w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-user"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Data</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="py-1 pr-1 w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-arrow-left-long">|</i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
                <li>
            </ul>
        </div>
    </aside>

    <div class="ml-64 w-[calc(100vw-16rem)] min-h-screen max-h-fit bg-zinc-500 flex grid grid-cols-2 gap-3 py-6">

        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Users</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Address
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultUsers->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultUsers->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["User_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Name"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Address"]."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Usertype</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultUsertypes->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultUsertypes->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["User_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Type"]."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Location</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Address
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Area
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultLocations->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultLocations->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";

                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["Loc_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Address"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Area"]."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Department</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Type
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Area
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Address
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultDepartments->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultDepartments->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["Dep_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Name"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Type"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Area"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Address"]."</td>";
                                        echo "</tr>";

                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Customer</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Service Voltage
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Rate
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Service Character
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Benefit
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultCustomers->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultCustomers->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["User_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Name"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Service_voltage"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Rate"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Service_character"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Benefits"]."</td>";
                                        echo "</tr>";

                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="m-5 h-fit p-6 bg-white dark:text-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <p><b>Employee</b></p>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Department Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Salary
                            </th>
                            <th scope="col" class="py-3 px-6">
                                SSN
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if ($resultEmployees->num_rows > 0) {
                                    // output data of each row
                                    while($row = $resultEmployees->fetch_assoc()) {
                                        echo "<tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                        echo "<th scope=\"row\" class=\"py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white\">".$row["User_ID"]."</th>";
                                        
                                        echo "<td class=\"py-4 px-6\">".$row["Name"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Title"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["Salary"]."</td>";

                                        echo "<td class=\"py-4 px-6\">".$row["SSN"]."</td>";
                                        echo "</tr>";

                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>
</html>