<?php 

if (isset($_POST['add_post'])) {
	
	$post_title = mysqli_real_escape_string($con, $_POST['title']);
	$post_author = mysqli_real_escape_string($con, $_POST['author']);
	$post_category = mysqli_real_escape_string($con, $_POST['cat_title']);
	$post_status = mysqli_real_escape_string($con, $_POST['status']);
	$post_tag = mysqli_real_escape_string($con, $_POST['tag']);

	$post_date = date('d-m-y');

	$post_comment_count = 4;
	$post_views_count = 0;

	$post_user = 'admin';

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_content = mysqli_real_escape_string($con, $_POST['content']);



    $move_image = move_uploaded_file($post_image_temp, "../images/$post_image");

   
    $query = "INSERT INTO posts(post_title, post_author, post_category, post_user,  post_content, post_status, post_views_count, post_tags, post_date, post_comment_count, post_images) VALUES(
        '$post_title',
        '$post_author',
        '$post_category',
        '$post_user',
        '$post_content',
        '$post_status',
        '$post_views_count',
        '$post_tag',
         now(),
        '$post_comment_count',
        '$post_image');";


       $result = mysqli_query($con, $query);

 if (!$result) {
       	die("Query Failed. "  . mysqli_error($con));
       }else{

       	 echo "you have successfully created a post.";
       }

}



 ?>


<h1 class="text-center text-uppercase">Add Post</h1>

<br>

<form action="" method="POST" enctype="multipart/form-data">
	

   <div class="form-group">
   	<label  for="post_title">Title</label>
   	<input class="form-control" type="text" name="title">
   </div>

   <div class="form-group">
   	<label  for="post_author">Author</label>
   	<input class="form-control" type="text" name="author">
   </div>

   <div class="form-group">
   
   <label for="cat_title">select category</label>
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






   </select>
  
   </div>

   <div class="form-group">
   	<label  for="post_status">Status</label>
   	<input class="form-control" type="text" name="status">
   </div>
   
   <div class="form-group">
   	<label  for="post_tag">Tag</label>
   	<input class="form-control" type="text" name="tag">
   </div>

   <div class="form-group">
   	<label  for="post_image">Image</label>
   	<input type="file" name="image">
   </div>
   
   <div class="form-group">
   	<textarea class="form-control" name="content" cols="30" rows="10" placeholder="add content"></textarea>
   </div>
 
   <input class="btn btn-primary btn btn-lg" type="submit" name="add_post" >

</form>
