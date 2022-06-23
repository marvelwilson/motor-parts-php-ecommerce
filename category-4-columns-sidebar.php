<?php 
  include 'header.php';
 ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-header block-header--has-breadcrumb block-header--has-title">
                <div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                    <a href="index" class="breadcrumb__item-link">Home</a>
                                </li>
                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                    <span class="breadcrumb__item-link">category page</span>
                                </li>
                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>
                        <h1 class="block-header__title"><?php 
                           if (isset($_GET['pro-q'])) {
                              echo $_GET['pro-q'];
                           }
                         ?></h1>
                    </div>
                </div>
            </div>
            <div class="block block-split block-split--has-sidebar">
                <div class="container">
                    <div class="block-split__row row no-gutters">
                        <div class="block-split__item block-split__item-sidebar col-auto">
                            <div class="card widget widget-categories-list">
                                <div class="widget-categories-list__body" data-collapse data-collapse-opened-class="widget-categories-list--open">
                                    <ul class="widget-categories-list__root">
                                        <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                                            <a href="" class="widget-categories-list__root-link">Headlights & Lighting</a>
                                            <ul class="widget-categories-list__child">
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Turn Signals" class="widget-categories-list__child-link">Turn Signals</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Fog Lights" class="widget-categories-list__child-link">Fog Lights</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Headlights" class="widget-categories-list__child-link">Headlights</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Switches & Relays" class="widget-categories-list__child-link">Switches & Relays</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Tail Lights" class="widget-categories-list__child-link">Tail Lights</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Headlights & Lighting>Corner Lights" class="widget-categories-list__child-link">Corner Lights</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                                            <a href="" class="widget-categories-list__root-link">Interior Parts</a>
                                            <ul class="widget-categories-list__child">
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Interior Parts>Floor Mats" class="widget-categories-list__child-link">Floor Mats</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Interior Parts>Gauges" class="widget-categories-list__child-link">Gauges</a>
                                                </li>
                                                <li class="wiindex?q=Interior Parts>dget-categories-list__child-item">
                                                    <a href="" class="widget-categories-list__child-link">Consoles & Organizers</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Interior Parts>Mobile" class="widget-categories-list__child-link">Mobile Electronics</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Interior Parts>Steering Wheels" class="widget-categories-list__child-link">Steering Wheels</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Interior Parts>Cargo Accessories" class="widget-categories-list__child-link">Cargo Accessories</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="widget-categories-list__root-item widget-categories-list__root-item--has-children" data-collapse-item>
                                            <a href="" class="widget-categories-list__root-link">Engine & Drivetrain</a>
                                            <ul class="widget-categories-list__child">
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Engine & Drivetrain>Air Filters" class="widget-categories-list__child-link">Air Filters</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Engine & Drivetrain>Oxygen Sensors" class="widget-categories-list__child-link">Oxygen Sensors</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Engine & Drivetrain>Heating" class="widget-categories-list__child-link">Heating</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Engine & Drivetrain>Exhaust" class="widget-categories-list__child-link">Exhaust</a>
                                                </li>
                                                <li class="widget-categories-list__child-item">
                                                    <a href="index?q=Engine & Drivetrain>Cranks & Pistons" class="widget-categories-list__child-link">Cranks & Pistons</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="widget-categories-list__root-item" data-collapse-item>
                                            <a href="index?q=Suspension" class="widget-categories-list__root-link">Suspension</a>
                                        </li>
                                        <li class="widget-categories-list__root-item" data-collapse-item>
                                            <a href="index?q=Fuel Systems" class="widget-categories-list__root-link">Fuel Systems</a>
                                        </li>
                                        <li class="widget-categories-list__root-item" data-collapse-item>
                                            <a href="index?q=Air Filters" class="widget-categories-list__root-link">Air Filters</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card widget widget-products">
                                <div class="widget__header">
                                    <h4>Latest Products</h4>
                                </div>
                                <div class="widget-products__list">
                                    <?php 
                                    $sele  = mysqli_query(connection(),"SELECT * FROM product_details ORDER BY id DESC LIMIT 5");
                           if (mysqli_num_rows($sele)>0) {
                               while ($result = mysqli_fetch_assoc($sele)) {
                                $image = json_decode($result['ad_images']);
                                     ?>
                                    <div class="widget-products__item">
                                        <div class="widget-products__image image image--type--product">
                                            <a href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>" class="image__body">
                                                <img class="image__tag" src="admin/img/ads/<?php echo $image[1] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="widget-products__info">
                                            <div class="widget-products__name">
                                                <a href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>"><?php echo $result['brand']; ?></a>
                                            </div>
                                            <div class="widget-products__prices">
                                                <div class="widget-products__price widget-products__price--current">NGN<?php echo number_format($result['amount']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                } ?>
                                </div>
                            </div>
                        </div>
                        <div class="block-split__item block-split__item-content col-auto">
                            <div class="block">
                                <div class="categories-list categories-list--layout--columns-4-sidebar">
                                    <ul class="categories-list__body">
                                        <?php if (isset($_GET['pro-q'])): 
                                           $pro_cat = $_GET['pro-q'];
                                        $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%$pro_cat%'");
                                           if (mysqli_num_rows($sele)>0) {
                                                  $result = mysqli_fetch_assoc($sele);
                                             json_decode($result['ad_images']);
                                            ?>
                                           
                                             
                                         <li class="categories-list__item">
                                            <a href="product-full?pro-q=<?php echo $pro_cat ?>&&pro-id=<?php echo $result['id'] ?>">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name"><?php echo $pro_cat; ?></div>
                                            </a>
                                            <div class="categories-list__item-products">items : <?php echo count($image); ?>)</div>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                          <?php }else{
                                            echo "<p class='h2 text-center'>Product Not Available Yet</p>";
                                          } ?>
                                        <?php elseif (!isset($_GET['pro-q'])):?>
                                        <?php

                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Headlights & Lighting%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Headlights & Lighting">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Headlights & Lighting</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                           <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Fuel System%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Fuel System">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Fuel System</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                           <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Body Parts%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Body Parts">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Body Parts</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                          <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Wheels & Tires%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Wheels & Tires">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Wheels & Tires</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                           <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Engine & Drivetrain%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Engine & Drivetrain">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Engine & Drivetrain</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                           <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Interior Parts%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Interior Parts">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Interior Parts</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                           <?php 
                                         $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE category LIKE '%Tools & Garage%'");
                                           if (mysqli_num_rows($sele)>0) {
                                            
                                            $ex_cat = explode('>', $result['category']);

                                             json_decode($result['ad_images']);
                                             $category = $ex_cat[0];
                                             ?>
                                         <li class="categories-list__item">
                                            <a href="category-4-columns-sidebar?pro-q=Tools & Garage">
                                                <div class="image image--type--category">
                                                    <div class="image__body">
                                                        <img class="image__tag" src="admin/img/ads/<?php echo $image[2] ?>" alt="">
                                                    </div>
                                                </div>
                                                <div class="categories-list__item-name">Tools & Garage</div>
                                            </a>
                                            <div class="categories-list__item-products">products(<?php echo mysqli_num_rows($sele); ?>)</div>
                                        </li>
                                         <li class="categories-list__divider"></li>
                                        <?php }
                                             
                                           ?>
                                       <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-space block-space--layout--divider-nl"></div>
                            <div class="block block-products-carousel" data-layout="grid-4-sidebar">
                                <div class="container">
                                    <div class="section-header">
                                        <div class="section-header__body">
                                            <h2 class="section-header__title">Bestsellers</h2>
                                            <div class="section-header__spring"></div>
                                            <div class="section-header__arrows">
                                                <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                                    <button class="arrow__button" type="button"><svg width="7" height="11">
                                                            <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                                    <button class="arrow__button" type="button"><svg width="7" height="11">
                                                            <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="section-header__divider"></div>
                                        </div>
                                    </div>
                                    <div class="block-products-carousel__carousel">
                                        <div class="block-products-carousel__carousel-loader"></div>
                                        <div class="owl-carousel">
                                            <?php 
                                        
                                        $sele  = mysqli_query(connection(),"SELECT * FROM product_details WHERE item_option='bestseller' ORDER BY id DESC ");
                           if (mysqli_num_rows($sele)>0) {
                               while ($result = mysqli_fetch_assoc($sele)) {
                                $image = json_decode($result['ad_images']);
                                ?>
                                            <div class="block-products-carousel__column">
                                                <div class="block-products-carousel__cell">
                                                    <div class="product-card product-card--layout--grid">
                                                        <div class="product-card__image">
                                                            <div class="image image--type--product">
                                                                <a href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>" class="image__body">
                                                                    <img class="image__tag" src="admin/img/ads/<?php echo $image[1] ?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                                <div class="status-badge__body">
                                                                    <div class="status-badge__icon"><svg width="13" height="13">
                                                                            <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="status-badge__text"> <?php echo $result['brand']; ?> </div>
                                                                    <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="<?php echo $result['brand'] ?>"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__meta"><span class="product-card__meta-title">Items:</span> <?php echo count($image); ?></div>
                                                            <div class="product-card__name">
                                                                <div>
                                                                    <div class="product-card__badges">
                                                                        <div class="tag-badge tag-badge--<?php echo strtolower($result['conditions']) ?>"><?php echo $result['conditions'] ?></div>
                                                                    </div>
                                                                    <a href="product-full"><?php echo $result['brand']; ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__footer">
                                                            <div class="product-card__prices">
                                                                <div class="product-card__price product-card__price--current">NGN<?php echo number_format($result['amount']); ?></div>
                                                            </div>
                                                            <a class="product-card__addtocart-icon" href="?cat_sources=<?php echo $result['id'] ?>&amount=<?php echo $result['amount'] ?>&quantity=<?php echo $result['quantity'] ?>" aria-label="Add to cart">
                                                                <svg width="20" height="20">
                                                                    <circle cx="7" cy="17" r="2" />
                                                                    <circle cx="15" cy="17" r="2" />
                                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                                                </svg>
                                                            </a>
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
                            <div class="block-space block-space--layout--divider-nl"></div>
                                        <div class="block block-brands block-brands--layout--columns-8-full">
                <div class="container">
                    <ul class="block-brands__list">
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQHR_ahle4Rqy6KXLebATcI5JpCLQrxY4Lg1A&usqp=CAU" alt="">
                                <span class="block-brands__item-name">AimParts</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRjzAtpk70G_p7_USclC_7uiM_85k2QZsx1Iw&usqp=CAU" alt="">
                                <span class="block-brands__item-name">WindEngine</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSSmiowWgibIAY_KfNPkO61vleTP3qn9qLlpg&usqp=CAU" alt="">
                                <span class="block-brands__item-name">TurboElectric</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSIJzVBkb2Dq5UF6WtP75u6lTxrzKexo8wOaQ&usqp=CAU" alt="">
                                <span class="block-brands__item-name">StartOne</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTSut8GUA1uWpYHCgyeOkkdaZ4KGrRZ3JTc7w&usqp=CAU" alt="">
                                <span class="block-brands__item-name">Brandix</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://www.cstatic-images.com/car-pictures/main/USC80LEC361A021001.png" alt="">
                                <span class="block-brands__item-name">ABS-Brand</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQsPGzW5NRA5XpERc3BjVw_cyMwMv6e2UED_w&usqp=CAU" alt="">
                                <span class="block-brands__item-name">GreatCircle</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSGVz3bfr1mYEIRJC4eU2pWeLH60pCDWP3lNw&usqp=CAU" alt="">
                                <span class="block-brands__item-name">JustRomb</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbvXP41YIuZnS3Bgnf0UbKD2rN-yJcLYjiLg&usqp=CAU" alt="">
                                <span class="block-brands__item-name">FastWheels</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTDkQPAKXPvLIgHihs25D96UMmt6CUxe44IDA&usqp=CAU" alt="">
                                <span class="block-brands__item-name">Stroyka-X</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVga29DP6SCoVsF3rzKwYh4LqbFZehMmDddg&usqp=CAU" alt="">
                                <span class="block-brands__item-name">Mission-51</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ1VafYlNVhc4o_Zm86DWMV8SkHmGQC8HXRGg&usqp=CAU" alt="">
                                <span class="block-brands__item-name">FuelCorp</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSWblK5cl4rEyv9Ev6KdcPyE0CxnpjC9BlSJg&usqp=CAU" alt="">
                                <span class="block-brands__item-name">Roadster</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS6mmJyhMbHsMAyqI_6dKgkRdUHzwuroHlORQ&usqp=CAU" alt="">
                                <span class="block-brands__item-name">Blocks</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRGOdQah2Mmos8Ehd26a-Ir41gq0Dm6U5_cMA&usqp=CAU" alt="">
                                <span class="block-brands__item-name">4 Runner</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQaUck_28L30xu7vLfo_tjE4hOTBkTAAK-0FQ&usqp=CAU" alt="">
                                <span class="block-brands__item-name">4 Rings</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                    </ul>
                </div>
            </div>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--before-footer"></div>
                </div>
            </div>
        </div>
        <!-- site__body / end -->
        <?php 
        include 'footer.php';
         ?>