  <?php 
    require 'header.php';
   ?>
        <?php if (isset($_GET['log'])): 
          session_destroy();
          ?>
          
        <?php endif ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--lg">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                                <div class="card-body card-body--padding--2">
                                    <?php 
                        
                         if (isset($_POST['login'])) {
                           $email = $_POST['email'];
                             $password= $_POST['password'];
                          if ($password==null && $email==null) {
                             echo "<h2 class='alert alert-danger text-center'>this fields is required</h2>";
                          }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                             echo "<h2 class='alert alert-danger text-center'>invalid email</h2>";
                          }else if ($password!==null && $email!==null) {
                              $sele = mysqli_query(connection(),"SELECT * FROM user_info WHERE email='$email' AND password='$password'");
                              if (mysqli_num_rows($sele)>0) {
                                 $result = mysqli_fetch_assoc($sele);
                                 $_SESSION['id']=$result['id'];
                                   if (isset($_GET['cat_sources'])) {
                                    $cart = $_GET['cat_sources'];
                                    $quantity  = $_GET['quantity'];
                                    $amount  = $_GET['amount']; 
                                    $id = @$_SESSION['id'];
                                    $sl = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id' AND Product_id='$cart'");
                                    if (mysqli_num_rows($sl)>0) {
                                         $result = mysqli_fetch_assoc($sl);
                                    $quantities = $result['quantity']+$quantity;
                                    $total = $result['total']+$amount;
                                    $update = mysqli_query(connection(),"UPDATE added_items SET quantity='$quantities',total='$total' WHERE user_id='$id' AND product_id='$cart'");
                                     if ($update) {
                                        $sele = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                  $resu = mysqli_fetch_assoc($sele);
                            $total_quantity = $resu['total_quantity']+$quantity;
                            $sub_total = $resu['sub_total']+$amount;
                            $update = mysqli_query(connection(),"UPDATE added_items SET total_quantity = '$total_quantity',sub_total = '$sub_total'WHERE user_id='$id'");
                                   echo "<script>
                                              window.location='index'
                                             </script>";
                                     }
                                    }else{
                                       $insert = mysqli_query(connection(),"INSERT INTO added_items(Product_id,user_id,total,sub_total,quantity,total_quantity) VALUES('$cart','$id','$amount','$amount','$quantity','$quantity')");
                                        if ($insert) {
                                             echo "<script>
                                              window.location='index'
                                             </script>";

                                        }
                                    }
                                   }elseif (isset($_GET['comp'])) {
                                    $compare = $_GET['comp'];
                                    $id = $_SESSION['id'];
                                    $sl = mysqli_query(connection(),"SELECT * FROM compare WHERE user_id='$id' AND Product_id='$compare'");
                                    if (mysqli_num_rows($sl)>0) {
                                         echo "<script>
                                              window.location='product-full'
                                         </script>";
                                    }else{
                                        $insert = mysqli_query(connection(),"INSERT INTO compare(user_id,Product_id) VALUES('$id','$compare')");
                                        if ($insert) {
                                             echo "<script>
                                              window.location='product-full'
                                             </script>";
                                        }
                                    }
                                   }elseif (isset($_GET['wish'])) {
                                    $whistlist = $_GET['wish'];
                                     $id = $_SESSION['id'];
                                    $sl = mysqli_query(connection(),"SELECT * FROM whistlist WHERE user_id='$id' AND Product_id='$whistlist'");
                                    if (mysqli_num_rows($sl)>0) {
                                         // echo "<script>
                                         //      window.location='product-full'
                                         // </script>";
                                    }else{
                                        $insert = mysqli_query(connection(),"INSERT INTO whistlist(Product_id,user_id) VALUES('$whistlist','$id')");
                                        if ($insert) {
                                             // echo "<script>
                                             //  window.location='product-full'
                                             // </script>";
                                        }
                                    }
                                   }else{
                                    echo "<h2 class='alert alert-success'>successfully logged in</h2>";
                                   }
                              }else{
                                echo "<h2 class='alert alert-danger'>invalid login details</h2>";
                              }
                          }
                         }else{

                         ?>      
                       <h3 class="card-title">Login</h3>
                         <?php
                           }
                         ?>
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="signin-email">Email address</label>
                                            <input id="signin-email" type="email" name="email" class="form-control" placeholder="customer@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="signin-password">Password</label>
                                            <input id="signin-password" type="password" name="password" class="form-control" placeholder="Secret word">
                                            <small class="form-text text-muted">
                                                <a href="">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <span class="input-check form-check-input">
                                                    <span class="input-check__body">
                                                        <input class="input-check__input" type="checkbox" id="signin-remember">
                                                        <span class="input-check__box"></span>
                                                        <span class="input-check__icon"><svg width="9px" height="7px">
                                                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </span>
                                                <label class="form-check-label" for="signin-remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" name="login" class="btn btn-primary mt-3">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex mt-4 mt-md-0">
                            <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                                <div class="card-body card-body--padding--2">
                                    <?php 
                        
                         if (isset($_POST['register'])) {
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $re_pass = $_POST['re_pass'];

                          if ($email==null && $password==null && $re_pass==null) {
                             echo "<h2 class='alert alert-danger text-center'>this fields are required</h2>";
                          }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                             echo "<h2 class='alert alert-danger text-center'>invalid email</h2>";
                          }elseif ($re_pass!==$password) {
                              echo "<h2 class='alert alert-danger text-center'>password Miss Match</h2>";
                          }else if ($email!==null && $password!==null && $re_pass!==null) {
                              $sele = mysqli_query(connection(),"SELECT * FROM user_info WHERE  email='$email'");
                              if (mysqli_num_rows($sele)>0) {
                                echo "<h2 class='alert alert-danger'>email already exist</h2>";
                                
                              }else{
                                $insert = mysqli_query(connection(),"INSERT INTO user_info (email,password) VALUES('$email','$password')");
                                if ($insert) {
                                    
                                 $selec = mysqli_query(connection(),"SELECT * FROM user_info WHERE  email='$email'");
                                 $result = mysqli_fetch_assoc($selec);
                                 $_SESSION['id']=$result['id'];
                                   if (isset($_GET['cat_sources'])) {
                                    $cart = $_GET['cat_sources'];
                                    $id = $_SESSION['id'];
                                    $quantity  = $_GET['quantity'];
                                    $amount  = $_GET['amount']; 
                                    $sl = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id' AND Product_id='$cart'");
                                    if (mysqli_num_rows($sl)>0) {
                                         echo "<script>alert('this items is already in cart')
                                              window.location='index'
                                         </script>";

                                    }else{
                                         $insert = mysqli_query(connection(),"INSERT INTO added_items(Product_id,user_id,total,sub_total,quantity,total_quantity) VALUES('$cart','$id','$amount','$amount','$quantity','$quantity')");
                                        if ($insert) {
                                             echo "<script>
                                              window.location='index'
                                             </script>";

                                        }
                                    }
                                   }elseif (isset($_GET['comp'])) {
                                    $compare = $_GET['comp'];
                                    $id = $_SESSION['id'];
                                    $sl = mysqli_query(connection(),"SELECT * FROM compare WHERE user_id='$id' AND Product_id='$compare'");
                                    if (mysqli_num_rows($sl)>0) {
                                         echo "<script>
                                              window.location='product-full'
                                         </script>";
                                    }else{
                                        $insert = mysqli_query(connection(),"INSERT INTO compare(user_id,Product_id) VALUES('$id','$compare')");
                                        if ($insert) {
                                             echo "<script>
                                             window.location='product-full'
                                             </script>";
                                        }
                                    }
                                   }elseif (isset($_GET['wish'])) {
                                    $whistlist = $_GET['wish'];
                                     $id = $_SESSION['id'];
                                    $sl = mysqli_query(connection(),"SELECT * FROM whistlist WHERE user_id='$id' AND Product_id='$whistlist'");
                                    if (mysqli_num_rows($sl)>0) {
                                         echo "<script>
                                              window.location='product-full'
                                         </script>";
                                    }else{
                                        $insert = mysqli_query(connection(),"INSERT INTO whistlist(Product_id,user_id) VALUES('$whistlist','$id')");
                                        if ($insert) {
                                             echo "<script>
                                              window.location='product-full'
                                             </script>";
                                        }
                                    }
                                   }else{
                                    echo "<h2 class='alert alert-success'>You have successfully registered an account</h2>";
                                   }
                               }
                              }
                          }
                         }else{

                         ?>      
                        <h3 class="card-title">Register</h3>
                          <?php
                           }
                         ?>
                                    
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="signup-email">Email address</label>
                                            <input id="signup-email" type="email" name="email" class="form-control" placeholder="customer@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="signup-password">Password</label>
                                            <input id="signup-password" name='password' type="password" class="form-control" placeholder="Secret word">
                                        </div>
                                        <div class="form-group">
                                            <label for="signup-confirm">Repeat password</label>
                                            <input id="signup-confirm" type="password" name="re_pass" class="form-control" placeholder="Secret word">
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" name="register" class="btn btn-primary mt-3">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
      <?php
        require 'footer.php';
      ?>