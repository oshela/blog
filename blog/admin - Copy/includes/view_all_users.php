<table class = "table table-hover table-bordered">
                       
                       <thead>

                               <th>id</th>
                               <th>username</th>
                               <th>firstname</th>
                               <th>lastname</th>
                               <th>email</th>
                               <th>role</th>
                               
                               
                           </tr>
                       </thead>
                       <tbody>
                      <?php 
                      
                $query = "select * from users";
                $select_users = mysqli_query($connection, $query);

                while( $row = mysqli_fetch_assoc($select_users)){
                $user_id = $row['user_id'];
                $username = $row['user_name'];
                $user_password= $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
               
              

                        echo "<tr>";

                        echo "<td>{$user_id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$user_firstname}</td>";

                        //echo "<td>{$post_category_id}</td>";
                        
                        echo "<td>{$user_lastname}</td>";
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$user_role}</td>";


                        // $query = "SELECT* FROM posts WHERE post_id = $comment_post_id ";
                        // $select_post_id_query = mysqli_query($connection,$query);
                        
                        // while($row = mysqli_fetch_assoc($select_post_id_query)){

                        //         $post_id = $row['post_id'];
                        //         $post_title = $row['post_title'];
                        //         echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        // }

                        
                        echo "<td><a href='users.php?change_status_subscriber=$user_id'>make admin</a></td>";
                        
                        echo "<td><a href='users.php?change_status_admin=$user_id'>make subscriber</a></td>";
                       
                        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>edit</a></td>";

                        echo "<td><a onclick=\" javascript: return confirm('are you sure you want to delete?');\" href='users.php?delete=$user_id'>delete</a></td>";
                       
                        echo "</tr>";
                }
        
                        ?>
                       </tbody>
                       </table>


                       <?php 

                       if(isset($_GET['change_status_subscriber'])){

                        $change_to_admin = $_GET['change_status_subscriber'];

                        $query = "UPDATE `users` SET `user_role` = 'admin' WHERE `users`.`user_id` = {$change_to_admin} ";
                        $admin_query = mysqli_query($connection, $query);
                        header("location:users.php");
                
                      }



                        if(isset($_GET['change_status_admin'])){
                                
                                $change_to_subscriber = $_GET['change_status_admin'];

                                $query = "UPDATE `users` SET `user_role` = 'subscriber' WHERE `users`.`user_id` = {$change_to_subscriber} ";
                                $subscriber_query = mysqli_query($connection, $query);
                                header("location:users.php");
                        }


                        





                if(isset($_GET['delete'])){

                        $the_user_id = $_GET['delete'];

                        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                        $delete_user_query = mysqli_query($connection, $query);
                        header("location:users.php");
                }


                        ?>