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
                               
                                <?php if (!isset($_GET['Edit_address'])): ?>
                                <div class="card-header">
                                    <h5>Add Address</h5>
                                </div>
                                <?php add_address() ?>
                                <form method="POST">
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-10 col-xl-8">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="address-first-name">First Name</label>
                                                    <input type="text" name="firstname" class="form-control" id="address-first-name" placeholder="Mark">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address-last-name">Last Name</label>
                                                    <input type="text" name="lastname" class="form-control" id="address-last-name" placeholder="Twain">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-company-name">Company <span class="text-muted">(Optional)</span></label>
                                                <input type="text" name="company" class="form-control" id="address-company-name" placeholder="RedParts corp.">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-country">Country</label>
                                                <select id="address-country" name="country" class="form-control">
                                                    <option value="">Select a country...</option>
                                                    <?php countries(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-address1">Street Address</label>
                                                <input type="text" name="str_address" class="form-control" id="address-address1" placeholder="House number and street name">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-city">City</label>
                                                <input type="text" name="city" class="form-control" id="address-city" placeholder="Houston">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-state">State</label>
                                                <input type="text" name="state" class="form-control" id="address-state" placeholder="Texas">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-postcode">Postcode</label>
                                                <input type="text" name="postcode" class="form-control" id="address-postcode" placeholder="19720">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-email">Email address</label>
                                                    <input type="email" name="email" class="form-control" id="address-email" placeholder="user@example.com">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-phone">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="address-phone" placeholder="+1 999 888 7777">
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <div class="form-check">
                                                    <span class="input-check form-check-input">
                                                        <span class="input-check__body">
                                                            <input class="input-check__input" name="default" type="checkbox" id="default-address">
                                                            <span class="input-check__box"></span>
                                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <label class="form-check-label" for="default-address">Set as my default address</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 pt-3 mt-3">
                                                <button name="add" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                             <?php elseif (isset($_GET['Edit_address'])):
                                   $add_id = $_GET['Edit_address'];
                                   $sele_com = mysqli_query(connection(),"SELECT * FROM user_address WHERE id='$add_id' ");
                                    $result = mysqli_fetch_assoc($sele_com);
                              ?>
                                <div class="card-header">
                                    <h5>Add Address</h5>
                                </div>
                                <?php update_address() ?>
                                <form method="POST">
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-10 col-xl-8">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="address-first-name">First Name</label>
                                                    <input type="text" value="<?php echo $result['firstname'] ?>"  name="firstname" class="form-control" id="address-first-name" placeholder="Mark">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address-last-name">Last Name</label>
                                                    <input type="text" value="<?php echo $result['lastname'] ?>"  name="lastname" class="form-control" id="address-last-name" placeholder="Twain">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-company-name">Company <span class="text-muted">(Optional)</span></label>
                                                <input type="text" value="<?php echo $result['company_name'] ?>"  name="company" class="form-control" id="address-company-name" placeholder="RedParts corp.">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-country">Country</label>
                                                <select id="address-country" name="country" class="form-control">
                                                    <option value="<?php echo $result['country']?>"><?php echo $result['country']?></option>
                                                    <?php countries(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-address1">Street Address</label>
                                                <input type="text" value="<?php echo $result['str_address'] ?>"  name="str_address" class="form-control" id="address-address1" placeholder="House number and street name">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-city">City</label>
                                                <input type="text" value="<?php echo $result['city_town'] ?>"  name="city" class="form-control" id="address-city" placeholder="Houston">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-state">State</label>
                                                <input type="text" value="<?php echo $result['state_country'] ?>"  name="state" class="form-control" id="address-state" placeholder="Texas">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-postcode">Postcode</label>
                                                <input type="text"  value="<?php echo $result['postcode_zip'] ?>" name="postcode" class="form-control" id="address-postcode" placeholder="19720">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-email">Email address</label>
                                                    <input type="email" value="<?php echo $result['email_address'] ?>"  name="email" class="form-control" id="address-email" placeholder="user@example.com">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-phone">Phone Number</label>
                                                    <input type="text" value="<?php echo $result['phone'] ?>"  name="phone" class="form-control" id="address-phone" placeholder="+1 999 888 7777">
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <div class="form-check">
                                                    <span class="input-check form-check-input">
                                                        <span class="input-check__body">
                                                            <input class="input-check__input" <?php echo $result['stats']=='on'?'checked':''; ?> name="default" type="checkbox" id="default-address">
                                                            <span class="input-check__box"></span>
                                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <label class="form-check-label" for="default-address">Set as my default address</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 pt-3 mt-3">
                                                <button name="update" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
       <?php include 'footer.php'; ?>