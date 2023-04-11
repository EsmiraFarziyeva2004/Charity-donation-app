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
                                <h5 class="modal-title">Log in</h5>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="login">
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
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn_1 full_width text-center">Log in</button>
                                    <p>Don't have account? <a href="signup"> Register</a></p>
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
        <?php include 'layouts/footerJs.php'; ?>
    </body>
</html>