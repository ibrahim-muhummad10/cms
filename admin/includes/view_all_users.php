
  <table class="table table-bordered table-hovered">
  <thead>
      <tr>
          <th>Id</th>
          <th>username</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>email</th>
          <th>role</th>
        
      </tr>
  </thead>
  <tbody>
     
  <?php

$query = "SELECT * FROM users";
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



echo "<tr>";
echo "<td>{$user_id} </td>";
echo "<td>{$user_name} </td>";
echo "<td>{$user_firstname} </td>";
// $query = "SELECT * FROM cat where cat_id = $cat_id";
// $select_all=mysqli_query($connection,$query);
// while($row =mysqli_fetch_assoc($select_all)){
//    $cat_title = $row["cat_title"];
//    $cat_id = $row["cat_id"];
// }
echo "<td>{$user_lastname} </td>";
echo "<td>{$user_email} </td>";
echo "<td>{$user_role} </td>";

// $query = "SELECT * FROM posts WHERE post_id = $";
// $select_post_id = mysqli_query($connection,$query);
// while($row = mysqli_fetch_assoc()){
//     $post_id = $row['post_id'];
//     $post_title = $row['post_title'];
//     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>";
// }



echo "<td><a href='users.php?source=edit_user&user_id=$user_id'>edit </td>";
echo "<td><a href='users.php?delete=$user_id'>delete </td>";
echo "</tr>";
}
  ?>
         <?php 

          

         if(isset($_GET['delete'])){
         $user_id = $_GET['delete'];
          $query = "DELETE FROM users WHERE user_id = {$user_id}";
          mysqli_query($connection,$query );
          header("location: users.php");
         }
         ?> 
      
  </tbody>
</table>