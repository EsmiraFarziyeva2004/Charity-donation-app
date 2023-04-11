<div class="container-fluid no-gutters">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                
                <div class="serach_field-area">
                    <div class="search_inner">
                    <?php 
                        if($user[0]['type'] == 0){
                    ?>
                        <form action="<?=HOST;?>/search-community" method="POST">
                            <div class="search_field">
                                <input type="text" name="word" placeholder="Search organization..." >
                            </div>
                            <button type="submit"> <img src="<?=HOST;?>/img/icon/icon_search.svg" alt=""> </button>
                        </form>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="profile_info">
                        <img src="<?=HOST;?>/img/user.png" alt="#">
                        <div class="profile_info_iner">
                            <p>
                                <?php 
                                    if($user[0]['type'] == 0){
                                        echo 'Donor';
                                    }else{
                                        echo 'Organization';
                                    }
                                ?>
                            </p>
                            <h5><?=$user[0]['fullname'];?></h5>
                            <div class="profile_info_details">
                                <a href="<?=HOST;?>/profile">Manage Profile <i class="ti-user"></i></a>
                                <a href="<?=HOST;?>/logout">Log Out <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>