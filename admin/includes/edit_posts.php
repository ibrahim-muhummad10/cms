
<?php

    if(isset($_GET['p_id'])){

        $post_id=$_GET['p_id'];
$query = "SELECT * FROM posts where post_id = $post_id";
$select_posts=  mysqli_query($connection,$query);
while($row =mysqli_fetch_assoc($select_posts)){
// $post_id = $row["post_id"];
$cat_id = $row["cat_id"];
$post_title = $row["post_title"];
$post_author = $row["post_author"];
$post_image = $row["post_image"];
$post_content = $row["post_content"];
$post_date = $row["post_date"];
$status = $row["post_status"];    
$post_tags = $row["post_tags"];
$post_comment_count = $row["post_comment_count"]; 
    }
}



if(isset($_POST['edit'])){
    $cat_id = $_POST["post_category"];
    $post_title = $_POST["title"];
    $post_author = $_POST["author"];
    $post_image = $_FILES['img']['name'];
    $post_image_temp =$_FILES['img']['tmp_name'];
    $post_content = $_POST["post_content"];
    $post_date = date("d-m-y");
    $status = $_POST["post_status"];    
    $post_tags = $_POST["post_tags"];
    $post_comment_count = 4;
    move_uploaded_file($post_image_temp,"../img/$post_image");
        if(empty($post_image)){
            $query =" select post_image from posts where post_id = $post_id";
           $select_img = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_img)){
                $post_image = $row['post_image'];
            }
        }

    $query = "UPDATE posts SET 
    post_title ='$post_title',
    cat_id = '$cat_id',
    post_date = now(),
    post_author = '$post_author',
    post_status = '$status',
    post_tags = '$post_tags',
    post_content = '$post_content',
    post_image = '$post_image'

    WHERE post_id = $post_id";
    $update =mysqli_query($connection,$query);
    confirmQuery($update);
}

    
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="">title</label>
<input type="text" class="form-control" name="title" value="<?= $post_title; ?>">
</div>

<div class="form-group">
    <select name="post_category" id="post_category">
        <?php
          $query = "SELECT * FROM cat";
          $select_all=mysqli_query($connection,$query);
         while($row =mysqli_fetch_assoc($select_all)){
             $cat_title = $row["cat_title"];
             $cat_id = $row["cat_id"];

             echo "<option value='{$cat_id}'>{$cat_title}</option>";
         }

?>
    </select>
</div>

<div class="form-group">
<label for="">author</label>
<input type="text" class="form-control" name="author" value="<?= $post_author; ?>">
</div>

<div class="form-group">
<label for="">posr status</label>
<input type="text" class="form-control" name="post_status" value="<?= $status; ?>">
</div>

<div class="form-group">

<img src="../img/<?= $post_image?>" alt="" width="100">
<input type="file" name="img" id="">
</div>

<div class="form-group">
<label for="">post tags</label>
<input type="text" class="form-control" name="post_tags" value="<?= $post_tags; ?>">
</div>

<div class="form-group">
<label for="">post content</label>
<input type="text" class="form-control" name="post_content" value="<?= $post_content; ?>">
</div>

<div class="form-group">

<input type="submit" class="btn btn-primary" name="edit" value="publish post">
</div>


</form>