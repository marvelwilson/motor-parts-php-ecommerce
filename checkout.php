     <?php include 'header.php';      ?>
        <!-- site__body -->
          <script>
          function paystack () {



             }
</script>
        <div class="site__body">
            <div class="block-header block-header--has-breadcrumb block-header--has-title">
                <div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                    <a href="index.html" class="breadcrumb__item-link">Home</a>
                                </li>
                                <li class="breadcrumb__item breadcrumb__item--parent">
                                    <a href="" class="breadcrumb__item-link">Breadcrumb</a>
                                </li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                    <span class="breadcrumb__item-link">Current Page</span>
                                </li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title">Checkout</h1>
                    </div>
                </div>
            </div>
            <form method="POST" >
            <div class="checkout block">
                <div class="container container--max--xl">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="alert alert-lg alert-primary">Returning customer? <a href="account-login">Click here to login</a></div>
                        </div>
                        
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Billing details</h3>
                                    <?php 
                                    $id = @$_SESSION['id'];
                                    if (isset($_POST['add'])) {
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id' AND stats='on'");
                                     if (mysqli_num_rows($sele_com)>0) {
                                       $resu_com = mysqli_fetch_assoc($sele_com);
                                       ?><script>
                                             redirect_url = 'localhost/spare_parts/order-success?success'
                                            <?php 
                                            $reference = "abcdefghijklmopqrstuvwxyz";
                                            $sub=str_shuffle($reference);
                                            $needed = substr($sub, 10);
                                            $id = $_SESSION['id'];
                                            $select = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                            $resulter = mysqli_fetch_assoc($select);
                                            $main_amount = $resulter['sub_total']+950000;
                                            ?>
                                            var myHeaders = new Headers();
                                            myHeaders.append("Authorization", "Bearer sk_test_4297ffc62378b000492fe8d19b9662f6a906d2f1");
                                            myHeaders.append("Content-Type", "application/json");

                                            var raw = JSON.stringify({"email":"<?php echo $resu_com['email_address'] ?>","amount":"<?php echo $main_amount ?>","reference":"<?php echo $needed; ?>","metadata":{"custom_fields":[{"display_name":"<?php echo $resu_com['firstname'].' '.$resu_com['lastname'] ?>","variable_name":"","value":"<?php echo $resu_com['phone'] ?>"}]}});

                                            var requestOptions = {
                                            method: 'POST',
                                            headers: myHeaders,
                                            body: raw,
                                            redirect: "follow"
                                            };

                                            fetch("https://api.paystack.co/transaction/initialize", requestOptions)
                                            .then(response => response.text())
                                            .then(function (result){
                                            resu =JSON.parse(result)
                                            window.location = resu['data']['authorization_url']

                                            })
                                            .catch(error => console.log('error', error));
                                         </script>
                                       
                                       <?php }else{
                                           add_address();
                                            $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id' AND stats='on'");
                                     if (mysqli_num_rows($sele_com)>0) {
                                       $resu_com = mysqli_fetch_assoc($sele_com);
                                       ?><script>
                                             redirect_url = 'localhost/spare_parts/order-success?success'
                                            <?php 
                                            $reference = "abcdefghijklmopqrstuvwxyz";
                                            $sub=str_shuffle($reference);
                                            $needed = substr($sub, 10);
                                            $id = $_SESSION['id'];
                                            $select = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                            $resulter = mysqli_fetch_assoc($select);
                                            $main_amount = $resulter['sub_total']+950000;
                                            ?>
                                            var myHeaders = new Headers();
                                            myHeaders.append("Authorization", "Bearer sk_test_4297ffc62378b000492fe8d19b9662f6a906d2f1");
                                            myHeaders.append("Content-Type", "application/json");

                                            var raw = JSON.stringify({"email":"<?php echo $resu_com['email_address'] ?>","amount":"<?php echo $main_amount ?>","reference":"<?php echo $needed; ?>","metadata":{"custom_fields":[{"display_name":"<?php echo $resu_com['firstname'].' '.$resu_com['lastname'] ?>","variable_name":"","value":"<?php echo $resu_com['phone'] ?>"}]}});

                                            var requestOptions = {
                                            method: 'POST',
                                            headers: myHeaders,
                                            body: raw,
                                            redirect: "follow"
                                            };

                                            fetch("https://api.paystack.co/transaction/initialize", requestOptions)
                                            .then(response => response.text())
                                            .then(function (result){
                                            resu =JSON.parse(result)
                                            window.location = resu['data']['authorization_url']

                                            })
                                            .catch(error => console.log('error', error));
                                         </script>
                                           <?php 
                                       }
                                       }
                                    }if (isset($_GET['clear-default'])) {
                                       $update = mysqli_query(connection(),"UPDATE user_address SET stats='' WHERE user_id='$id'");
                                       if ($update) {
                                          ?><script>
                                                 window.location='checkout'
                                         </script><?php
                                       }
                                    }
                                          
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE user_id='$id' AND stats='on'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                    $resu_com = mysqli_fetch_assoc($sele_com);
                                         ?>
                                          
                                     <div class="form-group">
                                        <div class="form-check">
                                            <span class="input-check form-check-input">
                                                 <span class="input-radio__body">
                                                    <input <?php echo $resu_com['stats']=='on'?'checked':''; ?> class="input-radio__input" name="checkout_payment_method" type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-different-address">Ship to my Default address?</label>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <a href="?clear-default" class="form-check">
                                            
                                            <label class="form-check-label" for="checkout-different-address">Ship to a different address?</label>
                                        </a>
                                    </div>
                                 <?php }else{ ?>
                         
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-first-name">First Name</label>
                                            <input type="text" name="firstname" class="form-control" id="checkout-first-name" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-last-name">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" id="checkout-last-name" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                                        <input type="text" name="company" class="form-control" id="checkout-company-name" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-country">Country</label>
                                        <select id="checkout-country" name="country" class="form-control form-control-select2">
                                            <option>Select a country...</option>
                                           <?php countries() ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-street-address">Street Address</label>
                                        <input type="text" name="str_address" class="form-control" id="checkout-street-address" placeholder="Street Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-address">Apartment, suite, unit etc. <span class="text-muted">(Optional)</span></label>
                                        <input type="text" name="apartment" class="form-control" id="checkout-address">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-city">Town / City</label>
                                        <input type="text" name="city" class="form-control" id="checkout-city">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-state">State / County</label>
                                        <input type="text" name="state" class="form-control" id="checkout-state">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-postcode">Postcode / ZIP</label>
                                        <input type="text" name="postcode" class="form-control" id="checkout-postcode">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-email">Email address</label>
                                            <input type="email" name="email" class="form-control" id="checkout-email" placeholder="Email address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="checkout-phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-phone">Phone</label>
                                            <input type="text" name="default" class="form-control" value="on" style="display: none;">
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Shipping Details</h3>
                                    <div class="form-group">
                                        <label for="checkout-comment">Order notes <span class="text-muted">(Optional)</span></label>
                                        <textarea name="message" id="checkout-comment" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!isset($_SESSION['id'])): ?>
                            <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">PLease Login To Start Up Your Session</h3>
                                </div>
                            </div>
                        </div>
                        <?php elseif(isset($_SESSION['id'])):
                           $id = $_SESSION['id'];
                                             ?>

                        <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Your Order</h3>
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                        $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                         ?>
                                        <tbody class="checkout__totals-products">
                                            <?php 
                                     
                                        while ($resu_com = mysqli_fetch_assoc($sele_com)){
                                            $id=$resu_com['product_id'];
                                            $main = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$id'");
                                            $result = mysqli_fetch_assoc($main);
                                            $image = json_decode($result['ad_images']);
                                            $Material = explode('>', $result['category']);

                                        ?>
                                            <tr>
                                                <td><?php echo $result['brand']; ?></td>
                                                <td>NGN<?php echo number_format($resu_com['total']); ?>.00</td>
                                            </tr>
                                           <?php } 
                                            $resu_com = mysqli_fetch_assoc($sele_com);
                                           ?>
                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>NGN <?php echo number_format($resu_com['sub_total']); ?>.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>NGN9,500.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                            <tr>
                                                <th>Total</th>
                                                <td>NGN <?php echo number_format($resu_com['sub_total']+9500); ?>.00</td>
                                            </tr>
                                        </tfoot>
                                    <?php } ?>
                                    </table>
                                    <div class="checkout__payment-methods payment-methods">
                                        <ul class="payment-methods__list">
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header">
                                                    <span class="payment-methods__item-radio input-radio">
                                                        <span class="input-radio__body">
                                                            <input class="input-radio__input" name="checkout_payment_method" value="payStack" type="radio" checked>
                                                            <span class="input-radio__circle"></span>
                                                        </span>
                                                    </span>
                                                    <span class="payment-methods__item-title">PayStack</span>
                                                </label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-details text-muted">
                                                        Pay via payStack; you can pay with your credit card if you don’t have a Paystack account.
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="checkout__agree form-group">
                                        <div class="form-check">
                                            <span class="input-check form-check-input">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                    <span class="input-check__box"></span>
                                                    <span class="input-check__icon"><svg width="9px" height="7px">
                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-terms">
                                                I have read and agree to the website <a target="_blank" href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" name="add" class="btn btn-primary btn-xl btn-block">Place Order</button>
                                </div>
                            </div>
                        </div>
                    
                        <?php endif ?>
                    </div>
                </div>
            </div>
            </form>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php include 'footer.php'; ?>