<?php

    include_once "../controller/database.php";
    include_once "../encoder/json_encoder.php";

    if($_SERVER['REQUEST_METHOD'] != 'PUT'){

        json_encoder("400 Error", 
        ['error'=> "The request method isn't a valid request method, consider making a UPDATE request"]);
    }else{
        $connect = new Database();

        $data_in_json = file_get_contents('php://input');
    
        $data = json_decode($data_in_json, true);

        // foreach($data as $key => $value){
            echo "$key - $value";
        }

        var_dump($data);

    //     if(isset($data['id'])){
    //         $id = $data['id'];

    // $connect->deleteEmployee($id);
    //     }else{
    //         json_encoder("400 Error", 
    //         ['error'=> "Please provide an id to delete data"]);
    //     }
    }

   

    
