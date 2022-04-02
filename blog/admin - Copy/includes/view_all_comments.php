<table class = "table table-hover table-bordered">
                       
                       <thead>

                               <th>id</th>
                               <th>author</th>
                               <th>comments</th>
                               <th>email</th>
                               <th>status</th>
                               <th>in response to</th>
                               <th>date</th>
                               <th>approved</th>
                               <th>unapproved</th>
                               <th>delete</th>
                           </tr>
                       </thead>
                       <tbody>
                      <?php 
                      
                $query = "select * from comments";
                $select_comments = mysqli_query($connection, $query);

                while( $row = mysqli_fetch_assoc($select_comments)){
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
              

                        echo "<tr>";

                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                        echo "<td>{$comment_content}</td>";

                        //echo "<td>{$post_category_id}</td>";
                        
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_status}</td>";


                        $query = "SELECT* FROM posts WHERE post_id = $comment_post_id ";
                        $select_post_id_query = mysqli_query($connection,$query);
                        
                        while($row = mysqli_fetch_assoc($select_post_id_query)){

                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }

                        echo "<td>{$comment_date}</td>";
                        echo "<td><a href='comments.php?approved=$comment_id'>approve</a></td>";
                        echo "<td><a href='comments.php?unapproved=$comment_id'>unapprove</a></td>";
                        echo "<td><a onclick=\" javascript: return confirm('are you sure you want to delete?');\" href='comments.php?delete=$comment_id'>delete</a></td>";
                        echo "</tr>";
                }
        
                        ?>
                       </tbody>
                       </table>


                       <?php 

                       if(isset($_GET['approved'])){

                        $the_comment_id = $_GET['approved'];

                        $query = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comments`.`comment_id` = {$the_comment_id} ";
                        $approved_query = mysqli_query($connection, $query);
                        header("location:comments.php");
                
                      }



                        if(isset($_GET['unapproved'])){
                                
                                $the_comment_id = $_GET['unapproved'];

                                $query = "UPDATE `comments` SET `comment_status` = 'unapproved' WHERE `comments`.`comment_id` = {$the_comment_id} ";
                                $unapproved_query = mysqli_query($connection, $query);
                                header("location:comments.php");
                        }


                        





                if(isset($_GET['delete'])){

                        $the_comment_id = $_GET['delete'];

                        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("location:comments.php");
                }


                        ?>