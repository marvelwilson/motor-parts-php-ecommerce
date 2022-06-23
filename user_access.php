<?php 

if (!isset($_SESSION['id'])) {
      echo "<script>window.location='account-login'</script>";
     }
 ?>

 <div class="col-12 col-lg-3 d-flex">
                            <div class="account-nav flex-grow-1">
                                <h4 class="account-nav__title">Navigation</h4>
                                <ul class="account-nav__list">
                                    <li class="account-nav__item ">
                                        <a href="account-dashboard">Dashboard</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-profile">Edit Profile</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-orders">Order History</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-order-details">Order Details</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-addresses">Addresses</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-edit-address">Edit/Add Address</a>
                                    </li>
                                    <li class="account-nav__item ">
                                        <a href="account-password">Password</a>
                                    </li>
                                    <li class="account-nav__divider" role="presentation"></li>
                                    <li class="account-nav__item ">
                                        <a href="account-login?log=Logout">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>