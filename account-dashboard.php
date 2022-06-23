<?php 
  include 'header.php';
   ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        <?php include 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="dashboard">
                                <div class="dashboard__profile card profile-card">
                                    <div class="card-body profile-card__body">
                                        <div class="profile-card__avatar">
                                            <img src="images/avatars/avatar-4.jpg" alt="">
                                        </div>
                                        <?php
                                        $id = $_SESSION['id']; 
                                    $sele  = mysqli_query(connection(),"SELECT * FROM user_info WHERE id='$id'");
                                        $result = mysqli_fetch_assoc($sele);
                                         ?>
                                        <div class="profile-card__name"><?php echo $result['username']; ?></div>
                                        <div class="profile-card__email"><?php echo $result['email']; ?></div>
                                        <div class="profile-card__edit">
                                            <a href="account-profile?edit=<?php echo $result['id'] ?>" class="btn btn-secondary btn-sm">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        $id = $_SESSION['id']; 
                                    $sele_add  = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_add)>0) {
                                       $result = mysqli_fetch_assoc($sele_add);
                                         ?>
                                <div class="dashboard__address card address-card address-card--featured">
                                    <div class="address-card__badge tag-badge tag-badge--<?php echo $result['stats']=='on'?'theme':''; ?>"><?php echo $result['stats']=='on'?'DEFAULT':''; ?></div>
                                    <div class="address-card__body">
                                        
                                        <div class="address-card__name"><?php echo $result['firstname']." ". $result['firstname']; ?></div>
                                        <div class="address-card__row">
                                            <?php echo $result['str_address']; ?> 
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content"><?php echo $result['phone']; ?></div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content"><?php echo $result['email_address']; ?></div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="account-edit-address?Edit_address=<?php echo $result['id'] ?>">Edit Address</a>
                                        </div>
                                  
                                    </div>
                                </div>
                                <?php
                                    }else{
                                    echo "<h1>no address was found</h1>";
                                    } ?>
                                <div class="dashboard__orders card">
                                    <div class="card-header">
                                        <h5>Recent Orders</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                      $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM ordered WHERE user_id='$id' ORDER BY id DESC LIMIT 6");
                                    if (mysqli_num_rows($sele_com)>0) {
                                        while ($resu_com = mysqli_fetch_assoc($sele_com)){
                                        ?>
                                                    <tr>
                                                        <td><a href="account-order-details?pro-id=<?php echo $resu_com['product_id'] ?>">#<?php echo $resu_com['product_id'] ?></a></td>
                                                        <td><?php echo $resu_com['dy']; ?></td>
                                                        <td><?php echo $resu_com['status']; ?></td>
                                                        <td>NGN<?php echo number_format($resu_com['total']); ?> for <?php echo $resu_com['total_quantity']; ?> item(s)</td>
                                                    </tr>
                                                <?php  }
                                            } ?>
                                                </tbody>
                                            </table>
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