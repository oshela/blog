<?php

     if(isset($_GET['p_id'])){
       
        $the_post_id = $_GET['p_id']; 
     
     
$query = "select * from posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection, $query);

while( $row = mysqli_fetch_assoc($select_posts_by_id)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
$post_tags = $row['post_tags'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];

}
    }

if(isset($_POST['update_post'])){
         
    $title = $_POST['title'];

    $post_category = $_POST['post_category'];

    $author = $_POST['author'];
    $status = $_POST['post_status'];
    $tags = $_POST['post_tags'];

    $post_image = $_FILES['image']['name'];
    
    $post_image_temp = $_FILES['image']['tmp_name'];

   
   
   $content = $_POST['post_content'];
    


        move_uploaded_file($post_image_temp, "../images/$post_image");


        if(empty($post_image)){
            $query = "SELECT * FROM posts where post_id = $the_post_id";

            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)){

                $post_image = $row['post_image'];


            }
        }

$query = "UPDATE posts SET post_title = '{$title}', post_category_id = '{$post_category}', ";
$query .= "post_date = now(), post_author = '{$author}', post_status = '{$status}', ";
$query .= "post_tags = '{$tags}', post_content = '{$content}', post_image = '{$post_image}' ";
$query .= "WHERE post_id = {$the_post_id}";

$update_query = mysqli_query($connection, $query);

 confirm($update_query);

 echo "<script> window.alert('post updated'); </script>" ;
  

    }


 
?> 





<form action="" method="POST" enctype = "multipart/form-data">

<div class="form-group">
                <label for="title">post title</label>
                <input type = "text" value = "<?php echo $post_title ; ?>"class = "form-control" name= "title">

</div>

<div class="form-group">
             <select name="post_category" id="">
            <?php
    
    $query = "SELECT* FROM categories";
      $select_categories=mysqli_query($connection,$query);  

      confirm($select_categories);

      while( $row=mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value'$cat_id'>{$cat_title}</option>";


      }

    
      
            ?>

             </select>
</div>

<div class="form-group">
                <label for="title">post author</label>
                <input type = "text"value = "<?php echo $post_author  ?>" class = "form-control" name= "author">

</div>

<div class = "form-group">
<select name = "post_status">

<option value = '<?Php echo $post_status; ?>'><?php echo $post_status ;?></option>

<?php 

if($post_status == "publish"){

    echo "<option value = 'draft'>draft</option>";
}else{
    echo "<option value = 'publish'>publish</option>";
}



?>



</select>
</div>
<!-- <div class="form-group">
                <label for="post_status">post status</label>
                <input type = "text" value = "<?php echo $post_status  ?>" class = "form-control" name= "post_status">

</div> -->

<div class="form-group">
<img src = "../images/<?php echo $post_image; ?>"width = "100" alt = "">
<input type="file" name="image"
</div>

<div class="form-group">
                <label for="post_tags">post tags</label>
                <input type = "text" value = "<?php echo $post_tags ?>" class = "form-control" name= "post_tags">

</div>

<div class="form-group">
                <label for="post_content">post content</label>
                <textarea class = "form-control" name= "post_content" id = "" cols= "30" rows="10"><?php echo $post_content ?>
                </textarea>

</div>

<div class="form-group">
                <label for="cat-title">submit</label>
                <input type = "submit" class = "btn btn-primary" name= "update_post" value = "post">

</div>

</form>


