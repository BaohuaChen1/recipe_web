<?php
$servername="localhost";
$username="root";
$password="apple123";
$dbname="recipe_app";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Error:The connection is failed" .$conn->connect_error)
}

?>