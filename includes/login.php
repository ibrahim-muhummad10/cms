<?php 
include "db.php";
session_start();
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection ,$_POST['username']);
    $password = mysqli_real_escape_string($connection ,$_POST['password']);

    $query = "SELECT * FROM users WHERE user_name = '$username' ";

    $select_user = mysqli_query($connection,$query);

    if(!$select_user) {
        die("err".mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
    }

    
    if($username !== $user_name && $password !== $user_password){
        header("location: ../index.php");
       
    }else {
        $_SESSION['username'] = $user_name;
        $_SESSION['user_firstname'] = $user_firstname;
        $_SESSION['user_lastname'] = $user_lastname;
        $_SESSION['user_role'] = $user_role;
        header("location: ../admin");
    }
  
}