<?php

if(isset($_GET['edit_user'])){

    $the_user_id = $_GET['edit_user'];


    $query = "select * from users WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection, $query);

    while( $row = mysqli_fetch_assoc($select_users_query)){
    $user_id = $row['user_id'];
    $username = $row['user_name'];
    $user_password= $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

}
}

if (isset($_POST['edit_user'])) {

   $user_firstname = $_POST['user_firstname'];
    
   $user_lastname = $_POST['user_lastname'];
    
    $user_role = $_POST['user_role'];
    

    // $post_image = $_FILES['image']['name'];
    
    // $post_image_temp = $_FILES['image']['tmp_name'];
    

    $username = $_POST['user_name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');
  
    $query = "select randsalt from users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query){
        die("query failed" . mysqli_error($connection));
    }

 $row = mysqli_fetch_array($select_randsalt_query);
 $salt = $row['randsalt'];
 $hashed_password = crypt($user_password, $salt);


$query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', ";
$query .= "user_role = '{$user_role}', user_name = '{$username}', email = '{$user_email}', ";
$query .= "user_password = '{$hashed_password}'";
$query .= "WHERE user_id = {$the_user_id}";

$update_user_query = mysqli_query($connection, $query);

confirm($the_user_id);

}





?>





<form action="" method="POST" enctype = "multipart/form-data">

<div class="form-group">
                <label for="title">first name</label>
                <input type = "text" class = "form-control"value="<?php echo $user_firstname;?>" name= "user_firstname">

</div>

<div class="form-group">
                <label for="post_status">last name</label>
                <input type = "text" value="<?php echo $user_lastname;?>" class = "form-control" name= "user_lastname">

</div>

<div class="form-group">

<select name = "user_role">

<option value = "<?php echo $user_role;?>"><?php echo $user_role;?></option>

<?php

if($user_role == 'admin'){
    
    echo "<option value = 'subscriber'>subscriber</option>";
}else{
    echo "<option value = 'admin'>admin</option>";
}




?>





</select>




</div>



<!-- <div class="form-group">
                <label for="post_image"></label>
                <input type = "file" class = "form-control" name= "image">

</div> -->

<div class="form-group">
                <label for="post_tags">username</label>
                <input type = "text"value="<?php echo $username;?>" class = "form-control" name= "user_name">

</div>

<div class="form-group">
                <label for="post_content">email</label>
                <input type = "text" class = "form-control" value="<?php echo $user_email;?>" name= "user_email" >

</div>

<div class="form-group">
                <label for="post_content">password</label>
                <input type = "password"value="<?php echo $user_password;?>" class = "form-control" name= "user_password" >

</div>


<div class="form-group">
                <label for="cat-title">submit</label>
                <input type = "submit" class = "btn btn-primary" name= "edit_user" value = "edit">

</div>

</form>