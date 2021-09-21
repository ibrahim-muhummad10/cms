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
                      <?php
                    if (isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else $source ="";

                    switch($source){
                        case 'add_post';
                        include "includes/add_post.php";
                        break;

                        case '1';
                        echo "zbi";
                        break;
                        case '2';
                        echo "zbi";
                        break;

                        default:
                        include "includes/view_posts.php";
                        break;
                    }
                      ?>
                          </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

     </div>
        <!-- /#page-wrapper -->

        <?php include "includes/footer.php"; ?>