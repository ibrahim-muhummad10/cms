<?php

function insertCat(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
       if(empty($cat_title)|| $cat_title == "" ){
           echo "this field can't be empty";
       }else{
        $query = "INSERT INTO  cat(cat_title) VALUE ('{$cat_title}')";
        mysqli_query($connection,$query);
       }
    }


}


function editCat(){
    global $connection;
    
    }