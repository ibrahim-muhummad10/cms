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
                            <form action="">
                                <div class="form-group">
                                    <label for="cat-title">add category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="submit" class="btn btn-primary" name="submit" value="add category">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">

                                <?php   
                        $query = "SELECT * FROM cat";
                        $select_all=mysqli_query($connection,$query);
                       ?>


                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                       <?php 
                                        while($row =mysqli_fetch_assoc($select_all)){
                                            $cat_title = $row["cat_title"];
                                            $cat_id = $row["cat_id"];
                                          echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                           echo "<td>{$cat_title}</td>";
                                           echo "</tr>";
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