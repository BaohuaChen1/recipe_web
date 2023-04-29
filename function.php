<?php
require_once "config.phg";

// register new user, and insert into the user table
function registerUser($name,$email,$passord){
    global $conn;
    $hashed_password = password_hash($passord,PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user(name, email, password) VALUES(?,?,?)");
    // use the prepare function to connect to database
    if ($stmt->execute()){
        returen true;
    }
        else{
        return false;
    }
}

// to authenticate if the user's email and password are matched?
function authenticateUser($email,$passord){
    global $conn;
    $stmt = $conn->prepre("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $emial); //"s" : string, bind parameter values to prepared SQL statement
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch.assoc();

    if ($suer && password_verify($passord, $user["password"])){

        return $user["id"];
    }
        else{
            return false;
        }
    }

// to search recipes
function searchrecipes($search){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM recipe WHERE name LIKE ? OR category LIKE ? OR ingredient like?");
    $search = "%".$search."%";
    $stmt->bind_param("sss",$search,$search,$search);
    $stmt->execute();
    $result=$stmt->get_result();
    $recipes=$result->fetch_all(MYSQLI_ASSOC);
    return $recipes;

// to rate recipes
function rating($user_id, $recipe_id, $rating) {
   global $conn;
   $stmt = $conn->prepare("INSERT INTO rating(user_id, recipe_id, rating) VALUES (?, ?, ?)");
   $stmt->bind_param("iii", $user_id, $recipe_id, $rating);

   if ($stmt->execute()) {
     return true;
   } else {
     return false;
   }



}


?> 

