<?php include 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                       <?php include 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="addresses-list">
                                <a href="account-edit-address" class="addresses-list__item addresses-list__item--new">
                                    <div class="addresses-list__plus"></div>
                                    <div class="btn btn-secondary btn-sm">Add New</div>
                                </a>
                                <div class="addresses-list__divider"></div>
                                <?php if (isset($_GET['remove'])):
                                      $id = $_GET['remove'];
                                    $delete = mysqli_query(connection(),"DELETE  FROM user_address WHERE id='$id' ");
                                    if ($delete) {
                                        echo "<div class='alert alert-success'>Successfully Deleted Address No.".$id."</div>";
                                    }
                                 ?>
                                   
                                <?php endif ?>
                               <?php 
                                    $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id' ");
                                    if (mysqli_num_rows($sele_com)>0) {
                                        while ($resu_add = mysqli_fetch_assoc($sele_com)){
                                      
                                 ?>
                                <div class="addresses-list__item card address-card">
                                     <div class="address-card__badge tag-badge tag-badge--<?php echo $resu_add['stats']=='on'?'theme':''; ?>"><?php echo $resu_add['stats']=='on'?'DEFAULT':''; ?></div>
                                    <div class="address-card__body">
                                        <div class="address-card__name"><?php echo $resu_add['firstname']." ". $resu_add['firstname']; ?></div>
                                        <div class="address-card__row">
                                         <?php echo $resu_add['str_address']; ?>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content"><?php echo $resu_add['phone']; ?></div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content"><?php echo $resu_add['email_address']; ?></div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="account-edit-address?Edit_address=<?php echo $resu_add['id'] ?>">Edit</a>&nbsp;&nbsp;
                                            <a href="account-addresses?remove=<?php echo $resu_add['id'] ?>">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="addresses-list__divider"></div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
       <?php include 'footer.php'; ?>