<?php  include "includes/header.php"; ?>
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
                        <div class="col-sm-6">

                            <?php

                            if(isset($_GET['edit'])){
                               $cat_id = $_GET['edit'];
                                 $query = "SELECT cat_title FROM cat WHERE cat_id = $cat_id";
                              $edit_cat=  mysqli_query($connection,$query);
                              while($row =mysqli_fetch_assoc($edit_cat)){
                                $cat_title = $row["cat_title"];}
                             
                                if(isset($_POST['edit'] )&& $_POST['cat_title']!=""&&!empty( $_POST['cat_title'])){
                                    $cat_title = $_POST['cat_title'];
                                    $cat_id = $_GET['edit'];
                                   
                                    $query = "UPDATE cat  SET cat_title = '{$cat_title}' where cat_id = $cat_id";
                                    mysqli_query($connection,$query);
                                    header("location: categories.php");
                                }
                                ?>
                                <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">edit category</label>
                                    <input type="text" class="form-control" value="<?= $cat_title ?>" name="cat_title">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="submit" class="btn btn-primary" name="edit" value="edit category">
                                </div>
                            </form>
                                

                            <?php 
                                   
                                 

                              }  else{
                                insertCat();

                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">add category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="submit" class="btn btn-primary" name="submit" value="add category">
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                        <div class="col-sm-6">

                         <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                       <?php 
                                         $query = "SELECT * FROM cat";
                                         $select_all=mysqli_query($connection,$query);
                                        while($row =mysqli_fetch_assoc($select_all)){
                                            $cat_title = $row["cat_title"];
                                            $cat_id = $row["cat_id"];
                                          echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                           echo "<td>{$cat_title}</td>";
                                           echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                                           echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
                                           echo "</tr>";
                                        }

                                        if(isset($_GET['delete'])){
                                            $cat_id = $_GET['delete'];
                                            $query = "DELETE FROM cat WHERE cat_id = {$cat_id}";
                                            mysqli_query($connection,$query);
                                            header("location: categories.php");
                                        }


                                       ?>
                                   
                                </tbody>
</table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/footer.php"; ?>