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
                                <i class="fa fa-file"></i> categories
                            </li>
                        </ol>
                    </div>
                </div>


                <div class="row">
                	<div class="col-lg-6">

                		<?php 

                		if (isset($_POST['submit'])) {

                		   $cat_title = mysqli_real_escape_string($con, $_POST['category']);

                		   // error handling

                		   if ($cat_title == "" || empty($cat_title)) {
                		   	
                		   	echo 'Please fill up the box';
                		   }else{

                		   $query = "insert into category(category_title) values('$cat_title');";
                           $result = mysqli_query($con, $query);

                		   }
                		}

                		 ?>
                        
                        <!-- add to category -->
                		<form action="categories.php" method="POST">
                			<label for="category-title">Add Category</label>
							<input class="form-control" type="text" name="cat_title">
							<br>
							<input type="submit" value="Add Category" class="btn btn-primary" name="submit">
                		</form>

                        <br>

                      <?php 

                       if (isset($_GET['edit'])) {

                        $cat_id = $_GET['edit'];

                        include "includes/update_category.php";
                           
                       }
                       ?>


                	</div>
                	<div class="col-lg-6">
                		<table class="table table-bordered table-hover">
                			<thead>
                				<tr>
                					<th>Id</th>
                					<th>Category</th>
                				</tr>
                			</thead>
                			<tbody>

                      <?php 
                $query = "select * from category";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                	$category_id = $row['category_id'];
                    $category_title = $row['category_title'];
                  
                  echo '<tr>';
                  echo "<td>{$category_id}</td>";
                  echo "<td>{$category_title}</td>";
                  echo "<td><a href='categories.php?delete=$category_id'>delete</a></td>";
                  echo "<td><a href='categories.php?edit=$category_id'>edit</a></td>";

                  echo '</tr>';


                }

                 ?>

                			</tbody>


                            <?php 

                            if (isset($_GET['delete'])) {

                            $delete_category = $_GET['delete'];
                                
                            $query = "delete from category where category_id = {$delete_category}";
                            $result = mysqli_query($con, $query);

                            header("location: categories.php");

                            }
                                

                             ?>


                		</table>
                	</div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php" ?>