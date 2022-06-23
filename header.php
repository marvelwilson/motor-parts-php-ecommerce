<?php include 'admin/connect.php'; 
 include 'controller.php';

 

  if (isset($_GET['cart_sources'])) {
        $cart  = $_GET['cart_sources'];
        $quantity  = $_GET['quantity'];
        $amount  = $_GET['amount'];

     if (!isset($_SESSION['id'])) {
       header("location:account-login?&amount=$amount&quantity=$quantity&cat_sources=$cart");
     }else{
        $id = $_SESSION['id'];
        $amount = $_GET['amount'];
        $quantity = $_GET['quantity'];
         $select = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id' AND Product_id='$cart'");
         if (mysqli_num_rows($select)>0) {
            $result = mysqli_fetch_assoc($select);
            $quantities = $result['quantity']+$quantity;
            $total = $result['total']+$amount;
            $update = mysqli_query(connection(),"UPDATE added_items SET quantity='$quantities',total='$total' WHERE user_id='$id' AND product_id='$cart'");
            
         }else{
            
            $insert = mysqli_query(connection(),"INSERT INTO added_items(Product_id,user_id,total,quantity) VALUES('$cart','$id','$amount','$quantity')");
            
        }
        $sele = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                  $resu = mysqli_fetch_assoc($sele);
            $total_quantity = $resu['total_quantity']+$quantity;
            $sub_total = $resu['sub_total']+$amount;
            $update = mysqli_query(connection(),"UPDATE added_items SET total_quantity = '$total_quantity',sub_total = '$sub_total'WHERE user_id='$id'");
            
     }
   }else if (isset($_GET['compare'])) {
       $cart = $_GET['compare'];
    if (!isset($_SESSION['id'])) {
      header("location:account-login?comp=$cart");
     }else{
         $id = $_SESSION['id'];
        $sl = mysqli_query(connection(),"SELECT * FROM compare WHERE user_id='$id' AND Product_id='$cart'");
        if (mysqli_num_rows($sl)>0) {
            
        }else{
            $insert = mysqli_query(connection(),"INSERT INTO compare(user_id,Product_id) VALUES('$id','$cart')");
            
        }
     }
   }else if (isset($_GET['wishlist'])) {
    $cart = $_GET['wishlist'];
    if (!isset($_SESSION['id'])) {
       header("location:account-login?wish=$cart");
     }else{
        $id = $_SESSION['id'];
        $sl = mysqli_query(connection(),"SELECT * FROM whistlist WHERE user_id='$id' AND Product_id='$cart'");
        if (mysqli_num_rows($sl)>0) {
             
        }else{
            $insert = mysqli_query(connection(),"INSERT INTO whistlist(Product_id,user_id) VALUES('$cart','$id')");
            
        }
     }
   }
 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>Spare Parts</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="vendor/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.header-spaceship-variant-one.css" media="(min-width: 1200px)">
    <link rel="stylesheet" href="css/style.mobile-header-variant-one.css" media="(max-width: 1199px)">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
</head>

<body>
    <!-- site -->
    <div class="site">
        <!-- site__mobile-header -->
        <header class="site__mobile-header">
            <div class="mobile-header">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button" type="button">
                            <svg width="18px" height="14px">
                                <path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z" />
                            </svg>
                        </button>
                        <a class="mobile-header__logo" href="">
                            <h2>Spare<span class="text-dark">Parts</span></h2>
                        </a>
                        <div class="mobile-header__search mobile-search">
                            <form class="mobile-search__body">
                                <input type="text" class="mobile-search__input" placeholder="Enter keyword or part number">
                                <button type="button" class="mobile-search__vehicle-picker" aria-label="Select Vehicle">
                                    <svg width="20" height="20">
                                        <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
	c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
	C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
	c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
	c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
	C15.5,10.2,14,11.3,14,12z" />
                                    </svg>
                                    <span class="mobile-search__vehicle-picker-label">Vehicle</span>
                                </button>
                                <button type="submit" class="mobile-search__button mobile-search__button--search">
                                    <svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                                    </svg>
                                </button>
                                <button type="button" class="mobile-search__button mobile-search__button--close">
                                    <svg width="20" height="20">
                                        <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
	C17.1,15.7,17.1,16.3,16.7,16.7z" />
                                    </svg>
                                </button>
                                <div class="mobile-search__field"></div>
                            </form>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="mobile-indicator mobile-indicator--search d-md-none">
                                <button type="button" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon"><svg width="20" height="20">
                                            <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="account-login" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon"><svg width="20" height="20">
                                            <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
	c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="wishlist" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
	c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <?php 
                                               $id = @$_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    
                                    $resu_com = mysqli_fetch_assoc($sele_com);
                             ?>
                            <div class="mobile-indicator">
                                <a href="cart" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <circle cx="7" cy="17" r="2" />
                                            <circle cx="15" cy="17" r="2" />
                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                        </svg>
                                        <span class="mobile-indicator__counter"><?php echo mysqli_num_rows($sele_com); ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- site__mobile-header / end -->
        <!-- site__header -->
        <header class="site__header">
            <div class="header">
                <div class="header__megamenu-area megamenu-area"></div>
                <div class="header__topbar-start-bg"></div>
                <div class="header__topbar-start">
                    <div class="topbar topbar--spaceship-start">
                        <div class="topbar__item-text"><a class="topbar__link" href="contact-us-v1.html">Contacts</a>
                            <a class="topbar__link p-2" href="track-order">Track Order</a>
                        </div>
                    </div>

                </div>
                <?php 
                $id = @$_SESSION['id'];
                $sele_com = mysqli_query(connection(),"SELECT count(id) FROM compare WHERE user_id='$id'");
                $resu_com = mysqli_fetch_assoc($sele_com);
                 ?>
                <div class="header__topbar-end-bg"></div>
                <div class="header__topbar-end">
                    <div class="topbar topbar--spaceship-end">
                        <div class="topbar__item-button">
                            <a href="" class="topbar__button">
                                <span class="topbar__button-label">Compare:</span>
                                <span class="topbar__button-title"><?php echo $resu_com['count(id)']==null?'0.00':$resu_com['count(id)']; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header__navbar">
                    <div class="header__navbar-departments">
                        <div class="departments">
                            <button class="departments__button" type="button">
                                <span class="departments__button-icon"><svg width="16px" height="12px">
                                        <path d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z" />
                                    </svg>
                                </span>
                                <span class="departments__button-title">Menu</span>
                                <span class="departments__button-arrow"><svg width="9px" height="6px">
                                        <path d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z" />
                                    </svg>
                                </span>
                            </button>
                            <div class="departments__menu">
                                <div class="departments__arrow"></div>
                                <div class="departments__body">
                                    <ul class="departments__list">
                                        <li class="departments__list-padding" role="presentation"></li>
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="" class="departments__item-link">
                                                Headlights & Lighting
                                                <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--xl">
                                                    <div class="megamenu__image">
                                                        <img src="images/departments/departments-2.jpg" alt="">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Body Parts">Body Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Bumpers">Bumpers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Hoods">Hoods</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Grilles">Grilles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Door Handles">Door Handles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Car Covers">Car Covers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Tailgates">Tailgates</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Suspension">Suspension</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Steering">Steering</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Fuel Systems">Fuel Systems</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Transmission">Transmission</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Air Filters">Air Filters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Headlights & Lighting">Headlights & Lighting</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Headlights">Headlights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Tail Lights">Tail Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Turn Signals">Turn Signals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Switches & Relays">Switches & Relays</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Corner Lights">Corner Lights</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Brakes & Suspension">Brakes & Suspension</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Discs">Brake Discs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Wheel Hubs">Wheel Hubs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Air Suspension">Air Suspension</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Ball Joints">Ball Joints</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Pad Sets">Brake Pad Sets</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Interior Parts">Interior Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Floor Mats">Floor Mats</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Gauges">Gauges</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Consoles & Organizers">Consoles & Organizers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Mobile Electronics">Mobile Electronics</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Steering Wheels">Steering Wheels</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Cargo Accessories">Cargo Accessories</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Engine & Drivetrain">Engine & Drivetrain</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Engine & Drivetrain>Air Filters">Air Filters</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Engine & Drivetrain>Oxygen Sensors">Oxygen Sensors</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Engine & Drivetrain>Heating">Heating</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Engine & Drivetrain>Exhaust">Exhaust</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Engine & Drivetrain>Cranks & Pistons">Cranks & Pistons</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Tools & Garage">Tools & Garage</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Repair Manuals">Repair Manuals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Car Care">Car Care</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Code Readers">Code Readers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Tool Boxes">Tool Boxes</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="" class="departments__item-link">
                                                Interior Parts
                                                <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--lg">
                                                    <div class="megamenu__image">
                                                        <img src="images/departments/departments-1.jpg" alt="">
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Body Parts">Body Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Bumpers">Bumpers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Hoods">Hoods</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Grilles">Grilles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Door Handles">Door Handles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Car Covers">Car Covers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Tailgates">Tailgates</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Suspension">Suspension</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Steering">Steering</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Fuel Systems">Fuel Systems</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Transmission">Transmission</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Air Filters">Air Filters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Headlights & Lighting">Headlights & Lighting</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Headlights">Headlights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Tail Lights">Tail Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Turn Signals">Turn Signals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Switches & Relays">Switches & Relays</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Corner Lights">Corner Lights</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Brakes & Suspension">Brakes & Suspension</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Discs">Brake Discs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Wheel Hubs">Wheel Hubs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Air Suspension">Air Suspension</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Ball Joints">Ball Joints</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Pad Sets">Brake Pad Sets</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Interior Parts">Interior Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Floor Mats">Floor Mats</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Gauges">Gauges</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Consoles & Organizers">Consoles & Organizers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Mobile Electronics">Mobile Electronics</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Steering Wheels">Steering Wheels</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Cargo Accessories">Cargo Accessories</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Tools & Garage">Tools & Garage</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Repair Manuals">Repair Manuals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Car Care">Car Care</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Code Readers">Code Readers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Tools & Garage>Tool Boxes">Tool Boxes</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="" class="departments__item-link">
                                                Switches & Relays
                                                <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--md">
                                                    <div class="megamenu__image">
                                                        <img src="images/departments/departments-3.jpg" alt="">
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Body Parts">Body Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Bumpers">Bumpers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Hoods">Hoods</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Grilles">Grilles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Door Handles">Door Handles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Car Covers">Car Covers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Tailgates">Tailgates</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Suspension">Suspension</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Steering">Steering</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Fuel Systems">Fuel Systems</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Transmission">Transmission</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Air Filters">Air Filters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Headlights & Lighting">Headlights & Lighting</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Headlights">Headlights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Tail Lights">Tail Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Turn Signals">Turn Signals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Switches & Relays">Switches & Relays</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Corner Lights">Corner Lights</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Brakes & Suspension">Brakes & Suspension</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Discs">Brake Discs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Wheel Hubs">Wheel Hubs</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Air Suspension">Air Suspension</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Ball Joints">Ball Joints</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Brakes & Suspension>Brake Pad Sets">Brake Pad Sets</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-1of5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Interior Parts">Interior Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Floor Mats">Floor Mats</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Gauges">Gauges</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Consoles & Organizers">Consoles & Organizers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Mobile Electronics">Mobile Electronics</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Steering Wheels">Steering Wheels</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Interior Parts>Cargo Accessories">Cargo Accessories</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="" class="departments__item-link">
                                                Tires & Wheels
                                                <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--nl">
                                                    <div class="megamenu__image">
                                                        <img src="images/departments/departments-4.jpg" alt="">
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Body Parts">Body Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Bumpers">Bumpers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Hoods">Hoods</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Grilles">Grilles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Door Handles">Door Handles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Car Covers">Car Covers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Tailgates">Tailgates</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Suspension">Suspension</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Steering">Steering</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Fuel Systems">Fuel Systems</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Transmission">Transmission</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Air Filters">Air Filters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-5">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Headlights & Lighting">Headlights & Lighting</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Headlights">Headlights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Tail Lights">Tail Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Turn Signals">Turn Signals</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Switches & Relays">Switches & Relays</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Headlights & Lighting>Corner Lights">Corner Lights</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                            <a href="" class="departments__item-link">
                                                Tools & Garage
                                                <span class="departments__item-arrow"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="departments__item-menu">
                                                <div class="megamenu departments__megamenu departments__megamenu--size--sm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item megamenu-links__item--has-submenu">
                                                                    <a class="megamenu-links__item-link" href="category-4-columns-sidebar?pro-q=Body Parts">Body Parts</a>
                                                                    <ul class="megamenu-links">
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Bumpers">Bumpers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Hoods">Hoods</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Grilles">Grilles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Fog Lights">Fog Lights</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Door Handles">Door Handles</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Car Covers">Car Covers</a></li>
                                                                        <li class="megamenu-links__item"><a class="megamenu-links__item-link" href="index?q=Body Parts>Tailgates">Tailgates</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Suspension">Suspension</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Steering">Steering</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Fuel Systems">Fuel Systems</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Transmission">Transmission</a>
                                                                </li>
                                                                <li class="megamenu-links__item">
                                                                    <a class="megamenu-links__item-link" href="index?q=Air Filters">Air Filters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Clutches" class="departments__item-link">
                                                Clutches
                                            </a>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Fuel System" class="departments__item-link">
                                                Fuel Systems
                                            </a>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Steering" class="departments__item-link">
                                                Steering
                                            </a>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Suspension" class="departments__item-link">
                                                Suspension
                                            </a>
                                        </li>
                                        <li class="index?q=departments__item">
                                            <a href="Body Parts" class="departments__item-link">
                                                Body Parts
                                            </a>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Transmission" class="departments__item-link">
                                                Transmission
                                            </a>
                                        </li>
                                        <li class="departments__item">
                                            <a href="index?q=Air Filters" class="departments__item-link">
                                                Air Filters
                                            </a>
                                        </li>
                                        <li class="departments__list-padding" role="presentation"></li>
                                    </ul>
                                    <div class="departments__menu-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__navbar-menu">
                        <div class="main-menu">
                            <ul class="main-menu__list">
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="index" class="main-menu__link">
                                        Home
                                   </a>
                                </li>
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="#" class="main-menu__link">
                                        Shop
                                        <svg width="7px" height="5px">
                                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                                        </svg>
                                    </a>
                                    <div class="main-menu__submenu">
                                        <ul class="menu">
                                            <li class="menu__item menu__item--has-submenu">
                                                <a href="category-4-columns-sidebar" class="menu__link">
                                                    Category
                                                </a>                    
                                           </li>
                                            <li class="menu__item menu__item--has-submenu">
                                                <a href="product-full" class="menu__link">
                                                    Product
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="cart" class="menu__link">
                                                    Cart
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="track-order" class="menu__link">
                                                    Track Order
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="checkout" class="menu__link">
                                                    Checkout
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="wishlist" class="menu__link">
                                                    Wishlist
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="compare" class="menu__link">
                                                    Compare
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="account-login" class="main-menu__link">
                                        Account
                                        <svg width="7px" height="5px">
                                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                                        </svg>
                                    </a>
                                    <div class="main-menu__submenu">
                                        <ul class="menu">
                                            <li class="menu__item">
                                                <a href="account-login" class="menu__link">
                                                    Login & Register
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-dashboard" class="menu__link">
                                                    Dashboard
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-profile" class="menu__link">
                                                    Edit Profile
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-orders" class="menu__link">
                                                    Order History
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-order-details" class="menu__link">
                                                    Order Details
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-addresses" class="menu__link">
                                                    Address Book
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-edit-address" class="menu__link">
                                                    Edit Address
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <a href="account-password" class="menu__link">
                                                    Change Password
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header__logo">
                    <a href="index" class="logo">
                        <div class="logo__slogan">
                            Auto parts for Cars, trucks and motorcycles
                        </div>
                        <div class="logo__image">
                            <!-- logo -->
                           <h1>Spare<span class="text-dark">Parts</span></h1>  
                            <!-- logo / end -->
                        </div>
                    </a>
                </div>
                <div class="header__search">
                    <div class="search">
                        <form action="" class="search__body">
                            <div class="search__shadow"></div>
                            <input class="search__input" type="text" placeholder="Enter Keyword or Part Number">
                            <button class="search__button search__button--start" type="button">
                                <span class="search__button-icon"><svg width="20" height="20">
                                        <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
	c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
	C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
	c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
	c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
	C15.5,10.2,14,11.3,14,12z" />
                                    </svg>
                                </span>
                                <span class="search__button-title">Select Vehicle</span>
                            </button>
                            <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon"><svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                                    </svg>
                                </span>
                            </button>
                            <div class="search__box"></div>
                            <div class="search__decor">
                                <div class="search__decor-start"></div>
                                <div class="search__decor-end"></div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="header__indicators">
                    <div class="indicator">
                        <a href="wishlist" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <path d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2
	C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2
	z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="indicator indicator--trigger--click">
                        <a href="account-login" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
	C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" />
                                </svg>
                            </span>
                            <span class="indicator__title">Hello, Log In</span>
                            <span class="indicator__value">My Account</span>
                        </a>
                        <div class="indicator__content">
                            <div class="account-menu">
                                <form class="account-menu__form">
                                    <div class="account-menu__form-link">
                                        <a href="account-login">Create An Account</a>
                                    </div>
                                </form>
                                
                                <div class="account-menu__divider"></div>
                                <ul class="account-menu__links">
                                    <li><a href="account-dashboard">Dashboard</a></li>
                                    <li><a href="account-profile">Edit Profile</a></li>
                                    <li><a href="account-orders">Order History</a></li>
                                    <li><a href="account-addresses">Addresses</a></li>
                                </ul>
                                <div class="account-menu__divider"></div>
                                <ul class="account-menu__links">
                                    <li><a href="account-login?log=logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php 
                           $id = @$_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    
                                    $resu_com = mysqli_fetch_assoc($sele_com);
                     ?>
                    <div class="indicator indicator--trigger--click">
                        <a href="cart" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <circle cx="10.5" cy="27.5" r="2.5" />
                                    <circle cx="23.5" cy="27.5" r="2.5" />
                                    <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3
	l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14
	c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
                                </svg>
                                <span class="indicator__counter"><?php echo mysqli_num_rows($sele_com); ?></span>
                            </span>
                            <span class="indicator__title">Shopping Cart</span>
                            <span class="indicator__value">#<?php echo number_format($resu_com['sub_total']); ?></span>
                        </a>
                        <div class="indicator__content">
                            <div class="dropcart">
                                <ul class="dropcart__list">
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

                                    <li class="dropcart__item">
                                        <div class="dropcart__item-image image image--type--product">
                                            <a class="image__body" href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>">
                                                <img class="image__tag" src="admin/img/ads/<?php echo $image[0] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="dropcart__item-info">
                                            <div class="dropcart__item-name">
                                                <a href="product-full?pro-q=<?php echo $result['category'] ?>&&pro-id=<?php echo $result['id'] ?>"><?php echo $result['brand']; ?></a>
                                            </div>
                                            <ul class="dropcart__item-features">
                                                <li>Material: <?php echo $Material[0]; ?></li>
                                            </ul>
                                            <div class="dropcart__item-meta">
                                                <div class="dropcart__item-quantity"><?php echo $resu_com['quantity']; ?></div>
                                                <div class="dropcart__item-price">NGN<?php echo number_format($result['amount']); ?>.00</div>
                                            </div>
                                        </div>
                                        <a href="cart?del_cart=<?php echo $resu_com['id'] ?>&quantity=<?php echo $resu_com['quantity'] ?>&amount=<?php echo $resu_com['total'] ?>&user_id=<?php echo $resu_com['user_id'] ?>" class="dropcart__item-remove"><svg width="10" height="10">
                                                <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4
	C9.2,7.8,9.2,8.4,8.8,8.8z" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="dropcart__divider" role="presentation"></li>
                                    <?php }
                                    }
                                    } ?>
                                </ul>
                                <?php 
                                    $id = @$_SESSION['id'];
                                    $sele_com = mysqli_query(connection(),"SELECT * FROM added_items WHERE user_id='$id'");
                                    if (mysqli_num_rows($sele_com)>0) {
                                    $resu_com = mysqli_fetch_assoc($sele_com);
                                 ?>
                                <div class="dropcart__totals">
                                    <table>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>NGN<?php echo number_format($resu_com['sub_total']); ?>.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>NGN9,500.00</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>NGN <?php echo number_format($resu_com['sub_total']+9500); ?>.00</td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
                                <div class="dropcart__actions">
                                    <a href="cart" class="btn btn-secondary">View Cart</a>
                                    <a href="checkout" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- site__header / end -->