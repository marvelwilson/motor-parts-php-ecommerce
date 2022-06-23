  <?php include 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        <?php include 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order History</h5>
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
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM ordered WHERE user_id='$id'");
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
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
       <?php include 'footer.php'; ?>