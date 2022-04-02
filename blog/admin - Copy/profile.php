<?php
 include "includes/admin_header.php";
?>


    <div id="wrapper">

        <!-- Navigation -->
       
<?php
 include "includes/admin_nav.php";
?>
<?php
if(isset($_SESSION['username'])){
    
   $username = $_SESSION['username'];
$query ="SELECT * FROM users WHERE user_name = '{$username}' ";

$select_user_profile_query = mysqli_query($connection,$query);




while($row = mysqli_fetch_array($select_user_profile_query)){
    $user_id = $row['user_id'];
    $username = $row['user_name'];
    $user_password= $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['email'];
    $user_role = $row['user_role'];
}

}
?>
<?php
if(isset($_POST['update_user'])){
   
    $user_name =$_POST['user_name'];
    $user_password =$_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role =$_POST['user_role'];


    $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', user_name = '{$username}', email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}'";
    $query .= "WHERE user_name = '{$username}' ";
    
    $update_user_query = mysqli_query($connection, $query);
    
    confirm($user_id);
    
    }
    


?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            welcome admin
                            <small>oshela</small>
                        </h1>
                
                
                
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

<option ><?php echo $user_role;?></option>

<?php

if($user_role == 'admin'){
    
    echo "<option values = 'subscriber'>subscriber</option>";
}else{
    echo "<option values = 'admin'>admin</option>";
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
                <input type = "submit" class = "btn btn-primary" name= "update_user" value = "update profile">

</div>

</form>
          

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php
   include "includes/admin_footer.php";
   ?>
