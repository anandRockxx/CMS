<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


    <div id="wrapper">

        <?php include "includes/sidebar.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Dashboard
                            <small>Author</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> All Posts
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- page start -->

                <div class="row">
                    <div class="col-lg-12">
                        
                      
                    <?php 

                    if (isset($_GET['source'])) {

                        $source = $_GET['source'];

                    }else{
                        $source ="";
                    }

                        switch ($source) {
                            case 'add_posts':
                                include "includes/add_posts.php";
                                break;

                            case 'edit_post':
                               include "includes/edit_post.php";
                               break;
                                

                            default:
                              include "includes/view_all_posts.php";
                              break;
                    
                        }
                        

                     ?>





                    </div>
                </div>



            </div>
        </div>
    </div>

<?php include "includes/footer.php" ?>