<table class="table table-bordered table-hover"> 
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Title</th>
                                  <th>Author</th>
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
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_category = $row['post_category'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_images'];
                    $post_tags = $row['post_tags'];
                    $post_comment = $row['post_comment_count'];
                    $post_date = $row['post_date'];


                    ?>
                              <tr>
                                  <td><?php echo $post_id ?> </td>
                                  <td><?php echo $post_title ?> </td>
                                  <td><?php echo $post_author ?> </td>
                                  <td><?php echo $post_category ?> </td>
                                  <td><?php echo $post_status ?> </td>
                                  <td><?php echo  "<img class='img-responsive' src='../images/$post_image'>"?> </td>
                                  <td><?php echo $post_tags ?> </td>
                                  <td><?php echo $post_comment ?> </td>
                                  <td><?php echo $post_date ?> </td>
                                  <td> <?php echo "<a href='posts.php?source=edit_post&p_id={$post_id}'>edit</a>" ?> </td>
                                  <td> <?php echo "<a href='posts.php?delete={$post_id}'>delete</a>" ?> </td>
                              </tr>

                     <?php } ?>



                     <?php 
                    
                      if (isset($_GET['delete'])) {
                        
                        $delete_post = $_GET['delete'];

                        $query = "DELETE FROM posts WHERE post_id = '$delete_post';";
                        $result = mysqli_query($con, $query);

                        if (!$result) {
                          die("Query Failed." . mysqli_error($con));
                        }else{

                          echo 'your post successfully deleted.';

                          header("location: posts.php");
                        }



                      }





                      ?>
          
                          </tbody>
                      </table>