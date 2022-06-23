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
                                    <span class="breadcrumb__item-link">Current Page</span>
                                </li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title">Compare</h1>
                    </div>
                </div>
            </div>
 <div class="block">
                <div class="container container--max--xl">
                    <div class="wishlist">
                        <table class="wishlist__table">
                            <thead class="wishlist__head">
                                <tr class="wishlist__row wishlist__row--head">
                                    <th class="wishlist__column wishlist__column--head wishlist__column--image">Image</th>
                                    <th class="wishlist__column wishlist__column--head wishlist__column--product">Product</th>
                                    <th class="wishlist__column wishlist__column--head wishlist__column--stock">Stock status</th>
                                    <th class="wishlist__column wishlist__column--head wishlist__column--price">Price</th>
                                    <th class="wishlist__column wishlist__column--head wishlist__column--button"></th>
                                    <th class="wishlist__column wishlist__column--head wishlist__column--remove"></th>
                                </tr>
                            </thead>
                            <tbody class="wishlist__body">
                                <?php if (isset($_GET['del'])):
                                    $del_id = $_GET['del'];
                                   mysqli_query(connection(),"DELETE  FROM Compare WHERE id='$del_id'");
                                 ?>
                                <?php endif ?>
                                <?php 
                                    if (isset($_SESSION['id'])) {
                                      $id = $_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM Compare WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                        while ($resu_com = mysqli_fetch_assoc($sele_com)){
                                            $id=$resu_com['product_id'];
                                            $main = mysqli_query(connection(),"SELECT * FROM product_details WHERE id='$id'");
                                            $result = mysqli_fetch_assoc($main);
                                            $image = json_decode($result['ad_images']);
                                        ?>
                                <tr class="wishlist__row wishlist__row--body">
                                    <td class="wishlist__column wishlist__column--body wishlist__column--image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="admin/img/ads/<?php echo $image[0] ?>" alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="wishlist__column wishlist__column--body wishlist__column--product">
                                        <div class="wishlist__product-name">
                                            <a href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>"><?php echo $result['brand']; ?></a>
                                        </div>
                                    </td>
                                    <td class="wishlist__column wishlist__column--body wishlist__column--stock">
                                        <div class="status-badge status-badge--style--success status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__text"><?php echo $result['availability']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="wishlist__column wishlist__column--body wishlist__column--price">
                                        NGN<?php echo number_format($result['amount']); ?>.00
                                    </td>
                                    <td class="wishlist__column wishlist__column--body wishlist__column--button">
                                        <a href="?cart_sources=<?php echo $result['id'] ?>&amount=<?php echo $result['amount'] ?>&quantity=<?php echo $result['quantity'] ?>" class="btn btn-sm btn-primary">Add to cart</a>
                                    </td>
                                    <td class="wishlist__column wishlist__column--body wishlist__column--remove">
                                        <a href="?del=<?php echo $resu_com['id'] ?>" type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon">
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
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
      <?php include 'footer.php'; ?>