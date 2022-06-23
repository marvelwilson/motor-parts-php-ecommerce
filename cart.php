 <?php include 'header.php'; ?>
        <!-- site__body -->
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
                                
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                    <span class="breadcrumb__item-link">Cart Page</span>
                                </li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title">Shopping Cart</h1>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="cart">
                        <div class="cart__table cart-table">
                            <table class="cart-table__table">
                                <thead class="cart-table__head">
                                <?php
                          if (isset($_GET['del_cart'])) {
                            $cart_id = $_GET['del_cart'];
                            $amount = $_GET['amount'];
                            $quantity = $_GET['quantity'];
                            $user_id = $_GET['user_id'];

                            $select = mysqli_query(connection(),"SELECT * FROM added_items WHERE id='$cart_id'");
                            $result = mysqli_fetch_assoc($select);
                             $balance_amount = $result['sub_total']-$amount;
                             $balance_quantity = $result['total_quantity']-$quantity;
                             if ($balance_quantity>0) {
                              $update = mysqli_query(connection(),"UPDATE added_items SET total_quantity='$balance_quantity',sub_total='$balance_amount' WHERE user_id='$user_id'");
                            if ($update) {
                             mysqli_query(connection(),"DELETE FROM added_items WHERE id='$cart_id'");
                            echo "<div class='alert alert-success text-center'>product was successfully deleted from cart</div>";   
                            }
                             }else{
                                 mysqli_query(connection(),"DELETE FROM added_items WHERE id='$cart_id'");
                            echo "<div class='alert alert-success text-center'>product was successfully deleted from cart</div>";   
                             }
                        }
                    ?>
                                    <tr class="cart-table__row">
                                        <th class="cart-table__column cart-table__column--image">Image</th>
                                        <th class="cart-table__column cart-table__column--product">Product</th>
                                        <th class="cart-table__column cart-table__column--price">Price</th>
                                        <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                        <th class="cart-table__column cart-table__column--total">Total</th>
                                        <th class="cart-table__column cart-table__column--remove"></th>
                                    </tr>
                                </thead>
                                <tbody class="cart-table__body">
                                   <?php if (isset($_SESSION['id'])) {
                                      $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                        while ($resu_com = mysqli_fetch_assoc($sele_com)){
                                            $id=$resu_com['product_id'];
                                            $main = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$id'");
                                            $result = mysqli_fetch_assoc($main);
                                            $image = json_decode($result['ad_images']);
                                            $Material = explode('>', $result['category']);

                                        ?>
                                    <tr class="cart-table__row">
                                        <td class="cart-table__column cart-table__column--image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="admin/img/ads/<?php echo $image[0] ?>" alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--product">
                                            <a href="" class="cart-table__product-name"><?php echo $result['brand'] ?></a>
                                            <ul class="cart-table__options">
                                                <li>Material: <?php echo $Material[0]; ?></li>
                                            </ul>
                                        </td>
                                        <td class="cart-table__column cart-table__column--price" data-title="Price">NGN<?php echo number_format($resu_com['total']); ?>.00</td>
                                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                            <div class="cart-table__quantity input-number">
                                                <input class="form-control input-number__input" type="number" id="quantity_<?php echo $resu_com['product_id']; ?>" min="1" value="<?php echo $resu_com['quantity'] ?>">
                                                <div class="input-number__add" onclick="add_quantity(<?php echo $resu_com['product_id']; ?>,<?php echo $resu_com['user_id']; ?>,<?php echo $resu_com['total_quantity']; ?>,<?php echo $resu_com['total']; ?>,<?php echo $resu_com['sub_total']; ?>)"></div>
                                                <div class="input-number__sub" onclick="minux_quantity(<?php echo $resu_com['product_id']; ?>,<?php echo $resu_com['user_id']; ?>,<?php echo $resu_com['total_quantity']; ?>,<?php echo $resu_com['total']; ?>,<?php echo $resu_com['sub_total']; ?>)"></div>
                                            </div>
                                        </td>
                                        <td class="cart-table__column cart-table__column--total" data-title="Total">NGN<?php echo number_format($resu_com['total']); ?>.00</td>
                                        <td class="cart-table__column cart-table__column--remove">
                                            <a href="?del_cart=<?php echo $resu_com['id'] ?>&quantity=<?php echo $resu_com['quantity'] ?>&amount=<?php echo $resu_com['total'] ?>&user_id=<?php echo $resu_com['user_id'] ?>"  class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                                <svg width="12" height="12">
                                                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                  <?php 
                                    }
                                }
                            }
                                   ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart__totals">
                            <div class="card">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Cart Totals</h3>
                                    <table class="cart__totals-table">
                                        <?php 
                                          $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                    $resu_com = mysqli_fetch_assoc($sele_com);
                                         ?>
                                        <thead>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>NGN<?php echo number_format($resu_com['sub_total']); ?>.00</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>
                                                    NGN9,500.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>NGN0.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <td>NGN <?php echo number_format($resu_com['sub_total']+9500); ?>.00</td>
                                            </tr>
                                        </tfoot>
                                    <?php } ?>
                                    </table>
                                    <a class="btn btn-primary btn-xl btn-block" href="checkout">
                                        Proceed to checkout
                                    </a>
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