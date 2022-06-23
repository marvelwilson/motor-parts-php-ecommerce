 <?php include 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container">
                    <?php if (isset($_GET['track_id'])): 
                        $id = $_SESSION['id'];
                           $email = $_GET['email'];
                           $track_id = $_GET['track_id'];
                            $main = mysqli_query(connection(),"SELECT * FROM user_address WHERE email_address='$email' AND user_id='$id'");
                            if (mysqli_num_rows($main)>0) {


                                        
                        ?>
                        
                        <div class="card">
                            <div class="order-list">
                                <table>
                                    <thead class="order-list__header">
                                        <tr>
                                            <th class="order-list__column-label" colspan="2">Product</th>
                                            <th class="order-list__column-quantity">Quantity</th>
                                            <th class="order-list__column-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-list__products">
                                        <?php 
                                     
                                            $sle = mysqli_query(connection(),"SELECT * FROM ordered WHERE tracking_code='$track_id'");
                                        while ($resu_com = mysqli_fetch_assoc($sle)){
                                              $id=$resu_com['product_id'];
                                            $main = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$id'");
                                            $result = mysqli_fetch_assoc($main);
                                            $image = json_decode($result['ad_images']);
                                            $Material = explode('>', $result['category']);

                                        

                                        ?>
                                        <tr>
                                            <td class="order-list__column-image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag" src="images/products/product-2-40x40.jpg" alt="">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="order-list__column-product">
                                                <a href="#"><?php echo $result['brand']; ?></a>
                                            </td>
                                            <td class="order-list__column-quantity" data-title="Quantity:">
                                               <?php echo $resu_com['total_quantity']; ?>
                                            </td>
                                            <td class="order-list__column-total">
                                               NGN <?php echo number_format($resu_com['sub_total']); ?>.00
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                    </tbody>
                                    <tbody class="order-list__subtotals">
                                        <?php 
                                       $sle = mysqli_query(connection(),"SELECT * FROM ordered WHERE tracking_code='$track_id'");
                                        $resu_com = mysqli_fetch_assoc($sle);

                                         ?>
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Subtotal</th>
                                            <td class="order-list__column-total">NGN<?php echo number_format($resu_com['sub_total']); ?>.00</td>
                                        </tr>
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Shipping</th>
                                            <td class="order-list__column-total">NGN 9,500.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="order-list__footer">
                                        <tr>
                                            <th class="order-list__column-label" colspan="3">Total</th>
                                            <td class="order-list__column-total">NGN<?php echo number_format($resu_com['sub_total']+9500); ?>.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                       <!--  <div class="order-success__addresses">
                            <div class="order-success__address card address-card">
                                <div class="address-card__badge tag-badge tag-badge--theme">
                                    Shipping Address
                                </div>
                                <div class="address-card__body">
                                    <div class="address-card__name">Ryan Ford</div>
                                    <div class="address-card__row">
                                        Random Federation<br>
                                        115302, Moscow<br>
                                        ul. Varshavskaya, 15-2-178
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content">38 972 588-42-36</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content">stroyka@example.com</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-success__address card address-card">
                                <div class="address-card__badge tag-badge tag-badge--theme">
                                    Billing Address
                                </div>
                                <div class="address-card__body">
                                    <div class="address-card__name">Ryan Ford</div>
                                    <div class="address-card__row">
                                        Random Federation<br>
                                        115302, Moscow<br>
                                        ul. Varshavskaya, 15-2-178
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Phone Number</div>
                                        <div class="address-card__row-content">38 972 588-42-36</div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content">stroyka@example.com</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php }else{
                        echo "<h1>this email address does not exist";
                    } ?>
                    <?php elseif(!isset($_GET['track_id'])): ?>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                            <div class="card ml-md-3 mr-md-3">
                                <div class="card-body card-body--padding--2">
                                    <h1 class="card-title card-title--lg">Track Order</h1>
                                    <p class="mb-4">
                                        Enter the order ID and email address that was used to create the order, and then click the track button.
                                    </p>
                                    <form>
                                        <div class="form-group">
                                            <label for="track-order-id">Order ID</label>
                                            <input id="track-order-id" name="track_id" type="text" class="form-control" placeholder="Order ID">
                                        </div>
                                        <div class="form-group">
                                            <label for="track-email">Email address</label>
                                            <input id="track-email" name="email" type="email" class="form-control" placeholder="Email address">
                                        </div>
                                        <div class="form-group pt-4 mb-1">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Track</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php endif ?>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php include 'footer.php'; ?>