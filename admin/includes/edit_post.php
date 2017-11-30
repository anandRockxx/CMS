
<!-- get details of the post -->
<?php

if (isset($_GET['p_id'])) {
  
  $post_edit_id = $_GET['p_id'];

   $query = "SELECT * FROM  posts WHERE post_id = '$post_edit_id';";

   $result = mysqli_query($con, $query);

   if (!$result) {
     die("Query Failed. " . mysqli_error($con));
   }

   while ($row = mysqli_fetch_assoc($result)) {
       $post_title = $row['post_title'];
       $post_author = $row['post_author'];
       $post_category = $row['post_category'];
       $post_status = $row['post_status'];
       $post_tag = $row['post_tags'];
       $post_image = $row['post_images'];
       $post_content = $row['post_content'];
   }



if (isset($_POST['edit_post'])) {
  
  $post_title = mysqli_real_escape_string($con, $_POST['title']);
  $post_author = mysqli_real_escape_string($con, $_POST['author']);
  $post_category = mysqli_real_escape_string($con, $_POST['cat_title']);
  $post_status = mysqli_real_escape_string($con, $_POST['status']);
  $post_tag = mysqli_real_escape_string($con, $_POST['tag']);
  $post_content = mysqli_real_escape_string($con, $_POST['content']);

  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['tmp_name'];

  
    move_uploaded_file($post_image_temp, "../images/$post_image");


      if (empty($post_image)) {
        
        $query = "SELECT post_images FROM posts WHERE post_id = $post_edit_id ;";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $post_image = $row['post_images'];
        }
      }

  
       $query = "UPDATE posts SET post_title = '$post_title', ";
       $query.= " post_author = '$post_author', ";
       $query.= " post_category = '$post_category', ";
       $query.= " post_status = '$post_status', ";
       $query.= " post_tags = '$post_tag', ";
       $query.= " post_content = '$post_content', ";
       $query.= " post_images = '$post_image'";
       $query.= " WHERE post_id = $post_edit_id ;";


       $result = mysqli_query($con, $query);

 if (!$result) {
        die("Query Failed. "  . mysqli_error($con));

       }else{

         echo "your post successfully updated.";
       }

}
}

 ?>
 
<h1 class="text-center text-uppercase">Edit Post</h1>

<br>

<form action="" method="POST" enctype="multipart/form-data">
	

   <div class="form-group">
   	<label  for="post_title">Title</label>
   	<input class="form-control" value=" <?php echo $post_title ?> " type="text" name="title">
   </div>

   <div class="form-group">
   	<label  for="post_author">Author</label>
   	<input class="form-control"  value=" <?php echo $post_author ?> " type="text" name="author">
   </div>

   <div class="form-group">
   	<label  for="post_category">Category</label>
   <select name="cat_title">

  <?php 

   $query = "SELECT * FROM category";

   $result = mysqli_query($con, $query);

   if (!$result) {
    die("Query Failed." . mysqli_error($con));
   }

   while ($row = mysqli_fetch_assoc($result)) {
       
       $cat_title = $row['category_title'];

       echo "<option> $cat_title</option>";
   }


   ?>
   </div>
   <div class="form-group">
   	<label  for="post_tag">Tag</label>
   	<input class="form-control"  value=" <?php echo $post_status ?> " type="text" name="status">
   </div>
   
   <div class="form-group">
   	<label  for="post_tag">Tag</label>
   	<input class="form-control"  value=" <?php echo $post_tag ?> " type="text" name="tag">
   </div>

   <div class="form-group">
   	<label  for="post_image">Image</label>
    <br>
    <img width='320' height='240' src="../images/<?php echo $post_image ?> " alt="<?php echo $post_title ?>">
    <br>
    <br>
   	<input type="file" name="image">
   </div>
   
   <div class="form-group">
   	<textarea class="form-control" name="content" cols="30" rows="10" placeholder="add content"><?php echo $post_content ?></textarea>
   </div>
 
   <input class="btn btn-primary btn btn-lg" type="submit" name="edit_post" >

</form>
