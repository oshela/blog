                                        <?php


                                        if (isset($_POST['create_user'])) {

                                        $user_firstname = $_POST['user_firstname'];
                                            
                                        $user_lastname = $_POST['user_lastname'];
                                            
                                            $user_role = $_POST['user_role'];
                                            

                                            // $post_image = $_FILES['image']['name'];
                                            
                                            // $post_image_temp = $_FILES['image']['tmp_name'];
                                            

                                            $username = $_POST['user_name'];
                                            
                                            $user_email = $_POST['user_email'];
                                            $user_password = $_POST['user_password'];
                                            // $post_date = date('d-m-y');
                                        
                                            
                                        //move_uploaded_file($post_image_temp, "../images/$post_image");

                                        $query = "INSERT INTO users(user_firstname, user_lastname, user_role,
                                            user_name, user_password, email) ";
                                            $query .= " VALUES ('{$user_firstname}', '{$user_lastname}', 
                                            '{$user_role}', '{$username}', '{$user_password}', '{$user_email}')";
                                        $create_user_query = mysqli_query($connection, $query);


                                        confirm($create_user_query);

echo "<script>window.alert('user created');</script>";


                                        }





                                        ?>





                                        <form action="" method="POST" enctype = "multipart/form-data">

                                        <div class="form-group">
                                                        <label for="title">first name</label>
                                                        <input type = "text" class = "form-control" name= "user_firstname">

                                        </div>

                                        <div class="form-group">
                                                        <label for="post_status">last name</label>
                                                        <input type = "text" class = "form-control" name= "user_lastname">

                                        </div>

                                        <div class="form-group">

                                        <select name = "user_role">
                                        <option values = "subscriber">select option</option>

                                        <option values = "admin">admin</option>

                                        <option values = "subscriber">subscriber</option>

                                        </select>




                                        </div>



                                        <!-- <div class="form-group">
                                                        <label for="post_image"></label>
                                                        <input type = "file" class = "form-control" name= "image">

                                        </div> -->

                                        <div class="form-group">
                                                        <label for="post_tags">username</label>
                                                        <input type = "text" class = "form-control" name= "user_name">

                                        </div>

                                        <div class="form-group">
                                                        <label for="post_content">email</label>
                                                        <input type = "text" class = "form-control" name= "user_email" >

                                        </div>

                                        <div class="form-group">
                                                        <label for="post_content">password</label>
                                                        <input type = "password" class = "form-control" name= "user_password" >

                                        </div>


                                        <div class="form-group">
                                                        <label for="cat-title">submit</label>
                                                        <input type = "submit" class = "btn btn-primary" name= "create_user" value = "add user">

                                        </div>

                                        </form>