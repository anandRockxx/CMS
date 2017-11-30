<?php include "config/db.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            
            <div class="col-lg-8">

                <?php 

                if (isset($_GET['p_id'])) {
                    
                    $the_post_id = $_GET['p_id'];


                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ; ";

                $result = mysqli_query($con, $query);

                if (!$result) {
                    die("Post not found ." . mysqli_error($con));

                    echo $query;
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    
                   $post_title = $row['post_title'];
                   $post_author = $row['post_author'];
                   $post_date = $row['post_date'];
                   $post_image = $row['post_images'];
                   $post_content = $row['post_content'];

                 
                 ?>

                 <h1> <?php echo $post_title ?> </h1>

                
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>

                <hr>

                
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>

                
                <p class="lead"><?php echo $post_content ?></p>
              

               <?php }} ?>
                
                <hr>

               
               <?php include "comments.php"; ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
             <?php include "includes/sidebar.php"; ?>

        </div>

        <hr>

        <!-- Footer -->
 
     <?php include "includes/footer.php" ?>