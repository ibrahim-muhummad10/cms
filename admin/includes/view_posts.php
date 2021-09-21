
  <table class="table table-bordered table-hovered">
  <thead>
      <tr>
          <th>Id</th>
          <th>Author</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th>Image</th>
          <th>Tags</th>
          <th>Comments</th>
          <th>Date</th>
      </tr>
  </thead>
  <tbody>
     
  <?php

$query = "SELECT * FROM posts";
$select_posts=  mysqli_query($connection,$query);
while($row =mysqli_fetch_assoc($select_posts)){
$post_id = $row["post_id"];
$cat_id = $row["cat_id"];
$post_title = $row["post_title"];
$post_author = $row["post_author"];
$post_image = $row["post_image"];
$post_content = $row["post_content"];
$post_date = $row["post_date"];
$status = $row["post_status"];    
$post_tags = $row["post_tags"];
$post_comment_count = $row["post_comment_count"];  


echo "<tr>";
echo "<td>{$post_id} </td>";
echo "<td>{$post_author} </td>";
echo "<td>{$post_title} </td>";
echo "<td>{$cat_id} </td>";
echo "<td>{$status} </td>";
echo "<td> <img width='100' src='../img/{$post_image}'>    </td>";
echo "<td>{$post_tags} </td>";
echo "<td>{$post_comment_count} </td>";
echo "<td>{$post_date} </td>";

echo "</tr>";
}
  ?>
          
      
  </tbody>
</table>