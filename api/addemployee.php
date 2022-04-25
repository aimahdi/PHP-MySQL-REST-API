<?php

include_once "../controller/database.php";
include_once "../models/employee.php";
include_once "../encoder/json_encoder.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    json_encoder(
        "400 Error",
        ['error' => "The request method isn't a valid request method, consider making a POST request"]
    );
} else {
    $connect = new Database();


    $data_in_json = file_get_contents('php://input');

    $data = json_decode($data_in_json, true);

    if (
        isset($data['first_name']) &&
        isset($data['last_name']) &&
        isset($data['email']) &&
        isset($data['age']) &&
        isset($data['salary']) &&
        isset($data['first_name'])
    ) {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $age = $data['age'];
        $salary = $data['salary'];
        $designation = $data["designation"];

        $employee = new Employee();

        $employee->setFirstName($first_name);
        $employee->setLastName($last_name);
        $employee->setEmail($email);
        $employee->setAge($age);
        $employee->setSalary($salary);
        $employee->setDesignation($designation);

        $connect->addEmployee($employee);
    } else {
        json_encoder(
            "400 Error",
            ['error' => "Please provide a full employee details"]
        );
    }
}
