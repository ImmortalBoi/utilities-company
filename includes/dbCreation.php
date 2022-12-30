<?php
function createEntity($conn,$entityName,$sql){
    try {
        $conn->query($sql);
        echo "<p>" . $entityName. " created successfully</p>";
        return True;
    } catch (Exception $e) {
        echo "<p>Error creating " . $entityName .": " . $conn->error . "</p>";
        return False;
    }
}

function createDB($conn){
    // Create database
    if (createEntity($conn,'Database',"CREATE DATABASE utilities_company_DB") === False) {
        $conn->query('DROP DATABASE utilities_company_DB');
        echo "<p>Dropping Database</p>";
        echo "<p>Trying Again</p>";

        createEntity($conn,'Database',"CREATE DATABASE utilities_company_DB");
    }

    // Create User Table
    createEntity($conn, 'User' ,"CREATE TABLE `utilities_company_DB`.`User` ( 
        `User_ID` INT NOT NULL AUTO_INCREMENT , 
        `Name` VARCHAR(50) NOT NULL , 
        `Email` VARCHAR(50) NOT NULL , 
        `Address` VARCHAR(50) NOT NULL , 
        `Password` VARCHAR(50) NOT NULL , PRIMARY KEY (`User_ID`)) ENGINE = InnoDB; ");

    // Create Usertype Table
    createEntity($conn,'Usertypes',"CREATE TABLE `utilities_company_DB`.`Usertype` (
        `User_ID` int NOT NULL,
        `Type` enum('Employee','Customer') NOT NULL, 
        UNIQUE (`User_ID`)) ENGINE=InnoDB;
    ");

    // Create Usertype foreign keys
    createEntity($conn,'Usertype FK Constraint',"ALTER TABLE `utilities_company_DB`.`Usertype` 
        ADD FOREIGN KEY (`User_ID`) 
        REFERENCES `User`(`User_ID`) ON DELETE 
        RESTRICT ON UPDATE RESTRICT; ");

    // Create Location Table
    createEntity($conn,'Location',"CREATE TABLE `utilities_company_DB`.`Location` (
        `Loc_ID` INT NOT NULL AUTO_INCREMENT, 
        `Area` VARCHAR(50) NOT NULL , 
        `Address` VARCHAR(50) NOT NULL , 
        PRIMARY KEY (`Loc_ID`)) ENGINE = InnoDB; ");

    // Create Employee Table
    createEntity($conn,'Employee',"CREATE TABLE `utilities_company_DB`.`Employee` ( 
        `User_ID` INT NOT NULL , 
        `Dep_ID` INT NOT NULL , 
        `Title` VARCHAR(50) NOT NULL , 
        `Salary` VARCHAR(50) NOT NULL , 
        `SSN` BIGINT NOT NULL ) ENGINE = InnoDB; ");

    // Create Department Table
    createEntity($conn,'Department',"CREATE TABLE `utilities_company_DB`.`Department` (
        `Dep_ID` INT NOT NULL AUTO_INCREMENT, 
        `Loc_ID` INT NOT NULL , 
        `Name` VARCHAR(50) NOT NULL , 
        `Type` VARCHAR(50) NOT NULL , 
        PRIMARY KEY (`Dep_ID`)) ENGINE = InnoDB; ");

    // Create Employee FK
    createEntity($conn,'Employee userID Fk',"ALTER TABLE `utilities_company_DB`.`Employee` 
    ADD FOREIGN KEY (`User_ID`) 
    REFERENCES `User`(`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    createEntity($conn,'Employee DepID Fk',"ALTER TABLE `utilities_company_DB`.`Employee` 
        ADD FOREIGN KEY (`Dep_ID`) 
        REFERENCES `Department`(`Dep_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Department Fk
    createEntity($conn,'Department LocID FK',"ALTER TABLE `utilities_company_DB`.`Department` 
        ADD FOREIGN KEY (`Loc_ID`) 
        REFERENCES `Location`(`Loc_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Customer Table
    createEntity($conn,'Customer',"CREATE TABLE `utilities_company_DB`.`Customer` ( 
        `User_ID` INT NOT NULL , 
        `Service_voltage` INT NOT NULL , 
        `Rate` INT NOT NULL , 
        `Service_character` VARCHAR(50) NOT NULL , 
        `Benefits` VARCHAR(50) NULL ) ENGINE = InnoDB; ");

    // Create Customer FK
    createEntity($conn,'Customer UserID FK',"ALTER TABLE `utilities_company_DB`.`Customer` 
        ADD FOREIGN KEY (`User_ID`) 
        REFERENCES `User`(`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Generator Table
    createEntity($conn,"Generator","CREATE TABLE `utilities_company_DB`.`Generator` ( 
        `Gen_ID` INT NOT NULL AUTO_INCREMENT, 
        `Loc_ID` INT NOT NULL , 
        `Demand_min` INT NOT NULL , 
        `Fuel_needed` INT NOT NULL , 
        PRIMARY KEY (`Gen_ID`)) ENGINE = InnoDB; ");

    // Create Generator FK
    createEntity($conn,"Generator LocID FK","ALTER TABLE `utilities_company_DB`.`Generator` 
        ADD FOREIGN KEY (`Loc_ID`) 
        REFERENCES `Location`(`Loc_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;");

    // Create Utility_Bill Table
    createEntity($conn,"Utility Bill","CREATE TABLE `utilities_company_DB`.`Utility_Bill` ( 
        `Bill_ID` INT NOT NULL AUTO_INCREMENT, 
        `Gen_ID` INT NOT NULL , 
        `Paid_Status` BOOLEAN NOT NULL , 
        `KWH` INT NOT NULL , 
        `Payment_type` VARCHAR(50) NOT NULL , 
        PRIMARY KEY (`Bill_ID`)) ENGINE = InnoDB; ");

    // Create Utility_Bill FK
    createEntity($conn,"Utility Bill GenID FK","ALTER TABLE `utilities_company_DB`.`Utility_Bill` 
        ADD FOREIGN KEY (`Gen_ID`) 
        REFERENCES `Generator`(`Gen_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Meter Table
    createEntity($conn,"Meter","CREATE TABLE `utilities_company_DB`.`Meter` ( 
        `Meter_ID` INT NOT NULL AUTO_INCREMENT, 
        `User_ID` INT NOT NULL , 
        `Type` VARCHAR(50) NOT NULL , 
        `Max_load` INT NOT NULL , 
        PRIMARY KEY (`Meter_ID`)) ENGINE = InnoDB; ");

    // Create Meter FK
    createEntity($conn,"Meter UserID FK","ALTER TABLE `utilities_company_DB`.`Meter` 
        ADD FOREIGN KEY (`User_ID`) 
        REFERENCES `Customer`(`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Meter_Bill Table
    createEntity($conn,"Meter Bill","CREATE TABLE `utilities_company_DB`.`Meter_bill` ( 
        `Meter_ID` INT NOT NULL , 
        `Bill_ID` INT NOT NULL , 
        `Cost` FLOAT NOT NULL ) ENGINE = InnoDB; ");

    // Create Meter_Bill FK
    createEntity($conn,"Meter Bill BillID FK","ALTER TABLE `utilities_company_DB`.`Meter_bill` 
        ADD FOREIGN KEY (`Bill_ID`) 
        REFERENCES `Utility_Bill`(`Bill_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    createEntity($conn,"Meter Bill MeterID FK","ALTER TABLE `utilities_company_DB`.`Meter_bill` 
        ADD FOREIGN KEY (`Meter_ID`) 
        REFERENCES `Meter`(`Meter_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

    // Create Insurance Table
    createEntity($conn,"Insurance","CREATE TABLE `utilities_company_DB`.`Insurance` ( 
        `Ins_ID` INT NOT NULL AUTO_INCREMENT, 
        `User_ID` INT NOT NULL , 
        `Type` VARCHAR(50) NOT NULL , 
        `Cost` FLOAT NOT NULL , 
        PRIMARY KEY (`Ins_ID`)) ENGINE = InnoDB; ");

    // Create Insurance FK
    createEntity($conn,"Insurance UserID","ALTER TABLE `utilities_company_DB`.`Insurance` 
        ADD FOREIGN KEY (`User_ID`) 
        REFERENCES `Employee`(`User_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ");

}
?>