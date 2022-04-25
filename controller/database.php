<?php

include_once "config.php";

include_once "../models/employee.php";

include_once "../encoder/json_encoder.php";

class Database
{

    private $connection;

    function __construct()
    {

        $this->connection = new mysqli(Config::SERVER_NAME, Config::USER_NAME, Config::PASSWORD, Config::DATABASE_NAME);

        if ($this->connection->connect_error) {
            json_encoder(
                "400 Error",
                ['error' => 'Failed to connect MySQL using PHP, error: ' . mysqli_connect_error()]
            );
        } else {
            return $this->connection;
        }
    }

    public function addEmployee($employee)
    {
        $first_name = $employee->getFirstName();
        $last_name = $employee->getLastName();
        $email = $employee->getEmail();
        $age = $employee->getAge();
        $salary = $employee->getSalary();
        $designation = $employee->getDesignation();

        $query = "INSERT INTO employee (first_name, last_name, email, age, salary, designation) VALUES ('$first_name', '$last_name', '$email', '$age', '$salary', '$designation')";

        if ($this->connection->query($query) === TRUE) {
            json_encoder(
                "200 OK",
                ['success' => "New record created successfully"]
            );
        } else {
            json_encoder(
                "200 Ok",
                ['success' => "Error: " . $query . "\n" . $this->connection->error]
            );
        }
    }

    public function getEmployee($id)
    {

        $query = 'SELECT * FROM employee WHERE id = ' . $id;

        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            // output data of each row

            $data = $result->fetch_assoc();

            if (isset($data)) {
                $id = $data['id'];
                $first_name = $data['first_name'];
                $last_name = $data['last_name'];
                $email = $data['email'];
                $age = $data['age'];
                $salary = $data['salary'];
                $designation = $data['designation'];
                $updated_at = $data['updated_at'];
            }

            $employee = new Employee();

            $employee->setId($id);
            $employee->setFirstName($first_name);
            $employee->setLastName($last_name);
            $employee->setEmail($email);
            $employee->setAge($age);
            $employee->setSalary($salary);
            $employee->setDesignation($designation);
            $employee->setUpdatedAt($updated_at);

            json_encoder("200 OK", $employee);
        } else {
            json_encoder(
                "200 OK",
                ['success' => "0 results"]
            );
        }
    }

    public function getAllEmployee()
    {
        $query = 'SELECT * FROM employee';

        $result = $this->connection->query($query);

        $employees = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($data = $result->fetch_assoc()) {
                $id = $data["id"];
                $first_name = $data['first_name'];
                $last_name = $data['last_name'];
                $email = $data['email'];
                $age = $data['age'];
                $salary = $data['salary'];
                $designation = $data['designation'];
                $updated_at = $data['updated_at'];

                $employee = new Employee();

                $employee->setId($id);
                $employee->setFirstName($first_name);
                $employee->setLastName($last_name);
                $employee->setEmail($email);
                $employee->setAge($age);
                $employee->setSalary($salary);
                $employee->setDesignation($designation);
                $employee->setUpdatedAt($updated_at);

                array_push($employees, $employee);
            }

            json_encoder(
                "200 OK",
                $employees
            );

            echo json_encode($employees, true);
        } else {
            json_encoder(
                "200 OK",
                ['success' => "0 results"]
            );
        }
    }

    public function updateEmployee($employee){
        
    }

    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employee WHERE id = $id";

        if ($this->connection->query($query) === TRUE) {
            json_encoder(
                "200 OK",
                ['success' => "Record deleted successfully"]
            );
        } else {
            json_encoder(
                "400 Error",
                ['error' => "Error deleting record: " . $this->connection->error]
            );
        }
    }
}
