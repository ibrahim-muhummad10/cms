
  <table class="table table-bordered table-hovered">
  <thead>
      <tr>
          <th>Id</th>
          <th>Author</th>
          <th>comment</th>
          <th>email</th>
          <th>Status</th>
          <th>in response to</th>
          <th>date</th>
          <th>aprove</th>
          <th>unapprove</th>
      
          <th>delete</th>
      </tr>
  </thead>
  <tbody>
     
  <?php

$query = "SELECT * FROM comments";
$select_comments=  mysqli_query($connection,$query);
while($row =mysqli_fetch_assoc($select_comments)){
$comment_id = $row["comment_id"];
$comment_post_id = $row["comment_post_id"];
$comment_author = $row["comment_author"];
$comment_email = $row["comment_email"];
$comment_status = $row["comment_status"];
$comment_content = $row["comment_content"];
$coment_date = $row["comment_date"];



echo "<tr>";
echo "<td>{$comment_id} </td>";
echo "<td>{$comment_author} </td>";
echo "<td>{$comment_content} </td>";
// $query = "SELECT * FROM cat where cat_id = $cat_id";
// $select_all=mysqli_query($connection,$query);
// while($row =mysqli_fetch_assoc($select_all)){
//    $cat_title = $row["cat_title"];
//    $cat_id = $row["cat_id"];
// }
echo "<td>{$comment_email} </td>";
echo "<td>{$comment_status} </td>";
$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
$select_post_id = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_post_id)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a> </td>";
}

echo "<td>{$coment_date} </td>";
echo "<td><a href='comments.php?approve=$comment_id'>approve </td>";
echo "<td><a href='comments.php?unapprove=$comment_id'>unapprove </td>";

echo "<td><a href='comments.php?delete=$comment_id'>delete </td>";
echo "</tr>";
}
  ?>
         <?php 

           if(isset($_GET['approve'])){
            $approve_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_id";
            mysqli_query($connection,$query );
           header("location: comments.php");
            }
            if(isset($_GET['unapprove'])){
                $unapprove_id = $_GET['unapprove'];
                $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $unapprove_id";
                mysqli_query($connection,$query );
                header("location: comments.php");
                }
    





         if(isset($_GET['delete'])){
         $the_comment_id = $_GET['delete'];
          $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
          mysqli_query($connection,$query );
          header("location: comments.php");
         }
         ?> 
      
  </tbody>
</table>