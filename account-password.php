 <?php  include 'header.php'; ?>
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                       <?php    include 'user_access.php'; ?>
                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                           <form method="POST"> 
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                 <?php  change_password() ?>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-7 col-xl-6">
                                            <div class="form-group">
                                                <label for="password-current">Current Password</label>
                                                <input type="password" name="old_pass" class="form-control" id="password-current" placeholder="Current Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-new">New Password</label>
                                                <input type="password" name="password" class="form-control" id="password-new" placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Reenter New Password</label>
                                                <input type="password" name="re_pass" class="form-control" id="password-confirm" placeholder="Reenter New Password">
                                            </div>
                                            <div class="form-group mb-0">
                                                <button name="change" type="submit" class="btn btn-primary mt-3">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
        <?php   include 'footer.php'; ?>