<table class = "table table-hover table-bordered">
                       
                       <thead>

                               <th>id</th>
                               <th>author</th>
                               <th>title</th>
                               <th>category</th>
                               <th>status</th>
                               <th>image</th>
                               <th>tags</th>
                               <th>comments</th>
                               <th>date</th>
                               <th>view post</th>
                               <th>edit</th>
                               <th>delete</th>
                           </tr>
                       </thead>
                       <tbody>
                      <?php 
                      
                $query = "select * from posts";
                $select_posts = mysqli_query($connection, $query);

                while( $row = mysqli_fetch_assoc($select_posts)){
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];

                        echo "<tr>";

                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_author}</td>";
                        echo "<td>{$post_title}</td>";

                      
                
                        echo "<td>{$post_category_id}</td>";
                        

                        echo "<td>{$post_status}</td>";
                        echo "<td><img width ='100' src='../images/$post_image'alt = 'image'></td>";
                        echo "<td>{$post_tags}</td>";
                        echo "<td>{$post_comment_count}</td>";
                        echo "<td>{$post_date}</td>";
                        echo "<td><a href='../post.php?p_id={$post_id}'>view post</a></td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
                        echo "<td><a onclick=\" javascript: return confirm('are you sure you want to delete?');\" href='posts.php?delete={$post_id}'>delete</a></td>";
                        echo "</tr>";
                }
        
                        ?>
                       </tbody>
                       </table>


                       <?php 

                if(isset($_GET['delete'])){
                        $the_post_id = $_GET['delete'];

                        $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("location:posts.php");
                }


                        ?>