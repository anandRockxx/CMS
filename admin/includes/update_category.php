
                    <!-- update category -->
                    <form action="" method="POST">
                            <label for="category-title">Update Category</label>

                    

                           <?php 

                            if (isset($_GET['edit'])) {
                                
                                $cat_id = $_GET['edit'];

                                $query = "select * from category where category_id = {$cat_id}";
                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cat_id = $row['category_id'];
                                    $cat_title = $row['category_title'];
                             
                                ?>

                                <input value=" <?php if(isset($cat_title)){ echo $cat_title; } ?> " class="form-control" type="text" name="cat_title">



                            <?php } }?>


                            <?php 

                              if (isset($_POST['update'])) {
                                
                                $the_cat_title = $_POST['cat_title'];

                                $update_query = "UPDATE category SET category_title = '$the_cat_title' WHERE category_id = $cat_id ;";

                                 $result = mysqli_query($con, $update_query);

                                 header("location: categories.php");
                              }


                             ?>


                            <br>
                            <input type="submit" value="Update Category" class="btn btn-primary" name="update">
                        </form>