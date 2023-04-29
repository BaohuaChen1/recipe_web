<?php
require_once "config.php";
require_once "function.php"
// send a raw HTTP header to the client
header("Content-Type:application/json");

$action = $_GET["action"]?? '';

switch($action){
    case "register":
        registerEndpoint(); // call the register function
        break;
    case "login":
        loginEndpoint();
        break;
    case "search":
        searchEndpoint();
        break;
    case "rate":
        rateEndpoint();
        break;
    default: 
    // echo the error message 
    //using the json to encode 

        echo json_encode(['error'=>"invalid action"]);
        break;

        
function registerEndpoint(){

    $name = $_POST["name"] ??'';
    $email =$_POST['email'] ?? "";
    $password = $_POST["password"] ?? "";

    if(registerUser($name, $email, $password)){
        echo json_encode(["success"-> true]);
    }
        else{
            echo json_encoe(['error' => "Registration failed!"]);
        }
}



}







?>