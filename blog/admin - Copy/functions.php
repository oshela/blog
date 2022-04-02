<?php 


function confirm($result){

    global $connection;

    if(!$result){
        global $connection;

        die ("query failed ." .mysqli_error($connection));
    }

    
}

function insert_categories() {

    global $connection;

    if(isset($_POST['submit'])){
            
        $cat_title = $_POST['cat_title'];

        if(empty($cat_title)){

         echo " THIS FIELD SHOULD NOT BE EMPTY";
        } else{

         $query = " INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
        
         $create_category_query = mysqli_query($connection, $query);

         if(!$create_category_query){
             die('query failed'.mysqli_error($connection));
         }
        }

     }
}



function findallcategories() {

global $connection;

$query = "select * from categories";
$select_categories = mysqli_query($connection, $query);

while( $row = mysqli_fetch_assoc($select_categories)){
   $cat_id = $row['cat_id'];
   $cat_title = $row['cat_title'];
echo "<tr>";
   echo"<td>{$cat_id}</td>";
   echo"<td>{$cat_title}</td>";
   echo"<td><a href = 'categories.php?delete={$cat_id}'>delete</a></td>";
   echo"<td><a href = 'categories.php?edit={$cat_id}'>edit</a></td>";
   echo "</tr>";
}


}


function deletecategory() {
global $connection;

if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
$query = "DELETE FROM categories WHERE cat_id= {$the_cat_id} ";
$delete_query = mysqli_query($connection, $query);
header("location: categories.php");
    
}


}
function category(){
    $query= "SELECT * FROM categories WHERE cat_id = {$post_category_id}";

    $select_cat_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_cat_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
    }

}
function users_online(){
    global $connection;
    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out =$time - $time_out_in_seconds;
    
    $query = "SELECT * FROM users_online WHERE sess = '$session' ";
    $send_query = mysqli_query($connection,$query);
    if(!$send_query){
    die("query failed" . mysqli_error($connection));
    }
    
    $count =mysqli_num_rows($send_query);
    
    
    if($count == NULL){
    
        mysqli_query($connection, "INSERT INTO users_online (sess, time) VALUES ('$session', $time)");
    }else{
       
        mysqli_query($connection, "UPDATE users_online SET time = '$time' where sess = '$session'");
    
    }
    
    $users_online =  mysqli_query($connection, "SELECT * FROM users_online where time > '$time_out'");
    
    
    return $count_users = mysqli_num_rows($users_online);
    
    
}

?>