


<?php
$server = "localhost";
$password = "";
$username = "root";
$database = "siwes";

$connection = mysqli_connect($server, $username, $password, $database);

if($connection){
    echo "connection successful";

}else{
echo "connection failed";
}




?>