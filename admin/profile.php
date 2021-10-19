<?php  include "includes/header.php"; 

if(isset($_SESSION['username'])){
    
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE user_name = '$username'";
   $select_user =  mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_user)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
    }

}


if(isset($_POST['update_profile'])){
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];    
    $user_role = $_POST['user_role'];
    
    $query = "UPDATE users SET 
    user_firstname ='$user_firstname',
    user_lastname = '$user_lastname',
    user_name = '$user_name',
   
    user_email = '$user_email',
    user_password = '$user_password',
    user_role = '$user_role'
    WHERE user_name = '$username'";
    $update =mysqli_query($connection,$query);
    confirmQuery($update);
 
}
?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                           welcome to admin
                            <small>author</small>
                        </h1>
                        
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

<input type="submit" class="btn btn-primary" name="update_profile" value="update profile">
</div>


</form>
                           </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

     </div>
        <!-- /#page-wrapper -->

        <?php include "includes/footer.php"; ?>