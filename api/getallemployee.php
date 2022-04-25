<?php

    include_once "../controller/database.php";

    include_once "../encoder/json_encoder.php";

    if($_SERVER['REQUEST_METHOD'] != 'GET'){

        json_encoder("400 Error", 
        ['error'=> "The request method isn't a valid request method, consider making a GET request"]);
    }else{
        $connect = new Database();

        $connect->getAllEmployee();
    }

    
?>