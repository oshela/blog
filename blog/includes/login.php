<?php
include "db.php";
?>





<?php
session_start();
?>
<?php

if(isset($_POST['login'])){
    
$username = $_POST['username'];
$password = $_POST['password'];


$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

$query = "SELECT* FROM users WHERE user_name ='{$username}' ";

$select_user_query =mysqli_query($connection,$query);
if(!$select_user_query){
    die ("query failed".mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($select_user_query)){

    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_name = $row['user_name'];
    $pass_word = $row['user_password'];

}

    
$password = crypt($password, $pass_word);

if($username === $user_name && $password === $pass_word ){
    $_SESSION['username'] = $user_name;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['user_role'] = $user_role;
   
    header("Location: ../admin");
    
}else{
    header("Location: ../index.php");
}


}






?>