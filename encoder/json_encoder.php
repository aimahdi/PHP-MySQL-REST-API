<?php

function json_encoder($errorMessage, $array){

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("HTTP/1.1 $errorMessage");

    echo json_encode($array);
}
