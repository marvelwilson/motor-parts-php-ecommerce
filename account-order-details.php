  <?php include 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        <?php include 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <?php if (!isset($_GET['pro-id'])):
                              
                              $id = $_SESSION['id'];
                            $sele_com = mysqli_query(connection(),"SELECT * FROM ordered WHERE user_id='$id'ORDER BY id DESC LIMIT 1");
                            if (mysqli_num_rows($sele_com)>0) {
                            $resu_com = mysqli_fetch_assoc($sele_com);
                            $product_id = $resu_com['product_id'];
                            $sele= mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$product_id'");
                            $result = mysqli_fetch_assoc($sele);
                             ?>
                            <div class="card">
                                <div class="order-header">
                                    <div class="order-header__actions">
                                        <a href="account-orders" class="btn btn-xs btn-secondary">Back to list</a>
                                    </div>
                                    <h5 class="order-header__title">Order #<?php echo $resu_com['product_id']; ?></h5>
                                    <div class="order-header__subtitle">
                                        Was placed on <mark><?php echo $resu_com['dy']; ?></mark> and is currently <mark><?php echo $resu_com['status']; ?></mark>.
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <td><?php echo $result['brand']; ?></td>
                                                    <td>NGN<?php echo number_format($result['amount']).'.00'; ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>NGN <?php echo number_format($resu_com['sub_total']).'.00'; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$25.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>free</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>NGN<?php echo number_format($resu_com['total']).'.00'; ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                           <?php elseif (isset($_GET['pro-id'])):
                                   
                              $id = $_SESSION['id'];
                              $pro_id = $_GET['pro-id'];

                            $sele_com = mysqli_query(connection(),"SELECT * FROM ordered WHERE user_id='$id' AND product_id='$pro_id'");
                            if (mysqli_num_rows($sele_com)>0) {
                            $resu_com = mysqli_fetch_assoc($sele_com);
                            $product_id = $resu_com['product_id'];
                            $sele= mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$product_id'");
                            $result = mysqli_fetch_assoc($sele);
                             
                            ?>

                            <div class="card">
                                <div class="order-header">
                                    <div class="order-header__actions">
                                        <a href="account-orders" class="btn btn-xs btn-secondary">Back to list</a>
                                    </div>
                                    <h5 class="order-header__title">Order #<?php echo $resu_com['product_id']; ?></h5>
                                    <div class="order-header__subtitle">
                                        Was placed on <mark><?php echo $resu_com['dy']; ?></mark> and is currently <mark><?php echo $resu_com['status']; ?></mark>.
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <td><?php echo $result['brand']; ?></td>
                                                    <td>NGN<?php echo number_format($result['amount']).'.00'; ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>NGN <?php echo number_format($resu_com['sub_total']).'.00'; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$25.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>free</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>NGN<?php echo number_format($resu_com['total']).'.00'; ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            <?php endif ?>
                            <div class="row mt-3 no-gutters mx-n2">
                                <?php 
                                      $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id' ");
                                    if (mysqli_num_rows($sele_com)>0) {
                                        while ($resu_com = mysqli_fetch_assoc($sele_com)){
                                      
                                 ?>
                                <div class="col-sm-6 col-12 px-2">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Shipping Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name"><?php echo $resu_com['firstname']." ". $resu_com['firstname']; ?></div>
                                            <div class="address-card__row w-6">
                                               <?php echo $resu_com['str_address']; ?>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content"><?php echo $resu_com['phone']; ?></div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content"><?php echo $resu_com['email_address']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <?php 
                                  }
                              }
                               ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php include 'footer.php'; ?>