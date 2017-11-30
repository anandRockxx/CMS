<?php include "config/db.php" ?>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php 
                $query = "select * from category";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $category = $row['category_title'];
                  
                  echo "<li><a href='#''>{$category}</a></li>";

                }

                 ?>
                   <li><a href='admin'>admin</a></li>
                    
                </ul>
            </div>
            
        </div>

    </nav>

