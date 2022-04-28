<?php

    include_once "../controller/database.php";
    include_once "../encoder/json_encoder.php";
    include_once "../models/employee.php";

    if($_SERVER['REQUEST_METHOD'] != 'PUT'){

        json_encoder("400 Error", 
        ['error'=> "The request method isn't a valid request method, consider making a UPDATE request"]);
    }else{
        $connect = new Database();

        $data_in_json = file_get_contents('php://input');
    
        $data = json_decode($data_in_json, true);

        $updatedEmployee = new Employee();

        if(isset($data["id"])){
            $updatedEmployee->setId($data["id"]);
        }
        if(isset($data["first_name"])){
            $updatedEmployee->setFirstName($data["first_name"]);
        }
        if(isset($data["last_name"])){
            $updatedEmployee->setLastName($data["last_name"]);
        }
        if(isset($data["email"])){
            $updatedEmployee->setEmail($data["email"]);
        }
        if(isset($data["age"])){
            $updatedEmployee->setAge($data["age"]);
        }
        if(isset($data["salary"])){
            $updatedEmployee->setSalary($data["salary"]);
        }
        if(isset($data["designation"])){
            $updatedEmployee->setId($data["designation"]);
        }

        $connect->updateEmployee($updatedEmployee);

    }


   

    
