
<?php
if(isset($_POST['create_post'])){
    
    $cat_id = $_POST["post_category"];
    $post_title = $_POST["title"];
    $post_author = $_POST["author"];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp =$_FILES['post_image']['tmp_name'];
    $post_content = $_POST["post_content"];
    $post_date = date("d-m-y");
    $status = $_POST["post_status"];    
    $post_tags = $_POST["post_tags"];
   
    move_uploaded_file($post_image_temp,"../img/$post_image");

    $query = "INSERT INTO posts (cat_id,post_title,post_author,post_image,post_content,post_date,post_status,post_tags)
    VALUES ({$cat_id},'{$post_title}','{$post_author}','{$post_image}','{$post_content}',now(),'{$status}','{$post_tags}')  
    ";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
}



   

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="">title</label>
<input type="text" class="form-control" name="title">
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
<input type="text" class="form-control" name="author">
</div>

<div class="form-group">
<label for="">posr status</label>
<input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
<label for="">post image</label>
<input type="file"  name="post_image">
</div>

<div class="form-group">
<label for="">post tags</label>
<input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
<label for="">post content</label>
<input type="text" class="form-control" name="post_content">
</div>

<div class="form-group">

<input type="submit" class="btn btn-primary" name="create_post" value="publish post">
</div>


</form>