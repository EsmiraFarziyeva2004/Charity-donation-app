<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body style="background:#fff;">
        <div class="col-lg-12">
            <div class="white_box mt_60">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="modal-content cs_modal">
                            <div class="modal-header">
                                <h5 class="modal-title">Register</h5>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <?php 
                                            if(count($error) > 0){
                                                echo '<ul>';
                                                    foreach($error_msg as $msg){
                                                        echo '<li class="errorMsg">'.$msg.'</li>';
                                                    }
                                                echo '<ul> <br />';
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Please select account type: </label> <br />
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="radio" name="account" checked value="0" id="option2"> I'm Donor
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="account" value="1" id="option3"> Organization
                                        </label>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group"> 
                                        <input type="text" class="form-control" name="email" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_again" placeholder="Password again">
                                    </div>
                                    <div class="donor">
                                        <div class="form-group">
                                            <label>Add Balance</label>
                                            <input type="text" class="form-control" name="balance" placeholder="Balance (ex: 120)">
                                        </div>

                                        <div class="form-group">
                                            <label>Card Information</label>
                                            <input type="text" class="form-control" name="card_number" placeholder="Card Number (ex: 1234 1234 1234 1234)">
                                        </div>

                                        <div class="form-group">
                                        <label>Expiry Date: </label><div class="col-sm-2" style="display:inline-block;"><input type="text" class="form-control" name="expiry_date" placeholder="12/29"></div>
                                        <label>CVC: </label><div class="col-sm-4" style="display:inline-block;"><input type="text" class="form-control" name="cvc_code" placeholder="989"></div>
                                    </div>
                                </div>


                                    <button type="submit" class="btn_1 full_width text-center">Sign up</button>
                                    <p>Do you have account? <a href="login"> Log in</a></p>
                                    <!-- <div class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('input:radio[name="account"]').change(function(){
                    if($(this).val() == 1){
                        $('div.donor').hide();
                    }else{
                        $('div.donor').show();
                    }
                });
            });
            
        </script>
    </body>
</html>