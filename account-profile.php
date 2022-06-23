  <?php require 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                       <?php require 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                               <?php 
                        
                         if (isset($_POST['Save'])) {
                             $username = $_POST['username'];
                             $email= $_POST['email'];
                             $phone= $_POST['phone'];
                              $id = $_SESSION['id'];
                          if ($username==null && $email==null && $phone==null) {
                             echo "<h2 class='alert alert-danger text-center col-lg-4'>this fields is required</h2>";
                          }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                             echo "<h2 class='alert alert-danger text-center'>invalid email</h2>";
                          }else if ($username!==null && $email!==null && $phone!==null) {
                              $update = mysqli_query(connection(),"UPDATE user_info SET username='$username',email='$email',phone='$phone'   WHERE id='$id' ");
                              if ($update) {
                                echo "<h2 class='alert alert-success col-lg-4'>successfully Updated Info</h2>";
                              }
                          }
                         }else{

                         ?>      
                              <div class="card-header">
                                    <h5>Edit Profile</h5>
                                </div>
                         <?php
                           }
                         ?>
                                
                                <?php  $id = $_SESSION['id']; 
                                    $sele  = mysqli_query(connection(),"SELECT * FROM user_info WHERE id='$id'");
                                        $result = mysqli_fetch_assoc($sele); 
                                          ?>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-7 col-xl-6">
                                            <form method="POST">
                                            <div class="form-group">
                                                <label for="profile-last-name">Username</label>
                                                <input type="text" value="<?php echo $result['username'] ?>" class="form-control" id="profile-last-name" name="username" placeholder="Username..">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-email">Email Address</label>
                                                <input type="email" value="<?php echo $result['email'] ?>" name="email" class="form-control" id="profile-email" placeholder="Email Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-phone">Phone Number</label>
                                                <input type="text" name="phone" value="<?php echo $result['phone'] ?>" class="form-control" id="profile-phone" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group mb-0">
                                                <button class="btn btn-primary mt-3" name="Save" type="submit">Save</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php include 'footer.php'; ?>