
<div class="col-lg-12">
    <div class="white_box mb_30">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="modal-content cs_modal">
                    <div class="modal-header">
                        <h5 class="modal-title">My Profile</h5>
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
                                <input type="text" class="form-control" value="<?=$user[0]['fullname'];?>" name="fullname" placeholder="Fullname">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=$user[0]['username'];?>" name="username" placeholder="Username">
                            </div>
                            <div class="form-group"> 
                                <input type="text" class="form-control" value="<?=$user[0]['email'];?>" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=$user[0]['password'];?>" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn_1 full_width text-center">Update Profile</button>
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