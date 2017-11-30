<?php include "config/db.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>




    <!-- Page Content -->

    <div class="container">
        <div class="row">
            <div class="col-md-8">


               <?php 

               $query = "select * from posts";
               $result = mysqli_query($con, $query);

               while ($row = mysqli_fetch_assoc($result)) {

                   $post_id = $row['post_id'];
                   $post_title = $row['post_title'];
                   $post_author = $row['post_author'];
                   $post_date = $row['post_date'];
                   $post_image = $row['post_images'];
                   $post_content = $row['post_content'];


                  ?>


                <h1 class="page-header"><a href="post.php?p_id=<?php echo $post_id?> "><?php echo $post_title; ?></a></h1>


                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>

                <p>
                <span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?>
                </p>

                <hr>

                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                <hr>

                <p><?php echo $post_content; ?></p>

                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>



               <?php }?>



                <hr>


        <!-- pager  -->
        <?php include "includes/pager.php"; ?>  

            </div>




        <!-- siderbar -->
        <?php include "includes/sidebar.php"; ?>

        </div>
     

        <hr>

      <!-- footer -->
     <?php include "includes/footer.php" ?>