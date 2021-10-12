
<?php

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_users=  mysqli_query($connection,$query);
        while($row =mysqli_fetch_assoc($select_users)){
        $user_id = $row["user_id"];
        $user_name = $row["user_name"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_password = $row["user_password"];
        $user_email = $row["user_email"];
        $user_image = $row["user_image"];
        $user_role = $row["user_role"];
            
    }
}

if(isset($_POST['edit_user'])){
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["email"];
    $password = $_POST["password"];    
    $user_role = $_POST['user_role'];
    
    $query = "UPDATE users SET 
    user_firstname ='$user_firstname',
    user_lastname = '$user_lastname',
    user_name = '$user_name',
   
    user_email = '$user_email',
    user_password = '$password',
    user_role = '$user_role'
    WHERE user_id = $user_id";
    $update =mysqli_query($connection,$query);
    confirmQuery($update);
 
}





?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="">firstname</label>
<input type="text" class="form-control" value="<?= $user_firstname ?>" name="user_firstname">
</div>
<div class="form-group">
<label for="">lastname</label>
<input type="text" class="form-control" value="<?= $user_lastname ?>" name="user_lastname">
</div>

<select name="user_role"  id="">
    <option value="<?= $user_role ?>"><?= $user_role ?></option>
    <?php 
    if($user_role== 'admin'){
        echo " <option value='subscriper'>subscriper</option>";
    } else{
        echo " <option value='admin'>admin</option>";
    }
    
    ?>
   
</select>

<div class="form-group">
<label for="">email</label>
<input type="text" class="form-control" value="<?= $user_email ?>" name="email">
</div>

<div class="form-group">
<label for="">username</label>
<input type="text" class="form-control" value="<?= $user_name ?>" name="user_name">
</div>

<div class="form-group">
<label for=""> paswword</label>
<input type="text" class="form-control" value="<?= $user_password ?>" name="password">
</div>
<!-- 
<div class="form-group">
<label for="">post image</label>
<input type="file"  name="post_image">
</div> -->




<div class="form-group">

<input type="submit" class="btn btn-primary" name="edit_user" value="edit user">
</div>


</form>