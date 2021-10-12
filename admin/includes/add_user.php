
<?php
if(isset($_POST['add_user'])){
    
   
    $user_name = $_POST["user_name"];
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $email = $_POST["email"];
   
    $password = $_POST["password"];    
   $user_role = $_POST['user_role'];
   
    // move_uploaded_file($post_image_temp,"../img/$post_image");

    $query = "INSERT INTO users (user_firstname,user_lastname,user_email,user_password,user_name,user_role)
    VALUES ('{$user_firstname}','{$user_lastname}','{$email}','{$password}','{$user_name}','{$user_role}')  
    ";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
}



   

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="">username</label>
<input type="text" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="">lastname</label>
<input type="text" class="form-control" name="user_lastname">
</div>

<select name="user_role" id="">
    <option value="admin">admin</option>
    <option value="subscriper">subscriper</option>
</select>

<div class="form-group">
<label for="">email</label>
<input type="text" class="form-control" name="email">
</div>

<div class="form-group">
<label for="">username</label>
<input type="text" class="form-control" name="user_name">
</div>

<div class="form-group">
<label for=""> paswword</label>
<input type="text" class="form-control" name="password">
</div>
<!-- 
<div class="form-group">
<label for="">post image</label>
<input type="file"  name="post_image">
</div> -->




<div class="form-group">

<input type="submit" class="btn btn-primary" name="add_user" value="add user">
</div>


</form>