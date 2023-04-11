<br /><br />

<?php 
    if($user[0]['type'] == 0){
?>
    <div class="col-lg-12">
        <div class="single_element">
            <div class="quick_activity">
                <div class="row">
                    <div class="col-12">
                        <div class="quick_activity_wrap">
                            <div class="single_quick_activity d-flex">
                                <div class="icon">
                                    <img src="<?=HOST;?>/img/icon/man.svg" alt="">
                                </div>
                                <div class="count_content">
                                    <h3>$ <span class=""><?=$user[0]['balance'];?></span> </h3>
                                    <p>My Balance</p>
                                </div>
                            </div>
                            <div class="single_quick_activity d-flex">
                                <div class="icon">
                                    <img src="<?=HOST;?>/img/icon/cap.svg" alt="">
                                </div>
                                <div class="count_content">
                                    <h3><span class=""><?php 
                                        echo count($accounts->myDonations($_COOKIE['user']));
                                    ?></span> </h3>
                                    <p>My Donations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
?>

<?php 
    if($user[0]['type'] == 0){
        $donations = $community->getHistory($_COOKIE['user']);
    }else{
        $donations = $community->getHistoryOrg($_COOKIE['user']);
    }
?>

<div class="col-xl-12">
    <div class="white_box card_height_100">
        <div class="box_header border_bottom_1px  ">
            <div class="main-title">
                <h3 class="mb_25">Donation History</h3>
            </div>
        </div>
        <div class="Activity_timeline">
            <ul>
                <?php 
                    foreach($donations as $donation){
                        $organization_name = $community->getCommunity($donation['organization_id']);
                        if($user[0]['type'] == 1){
                            $user_data = $accounts->getUser($donation['user_id']);
                        }
                ?>
                    <li>
                        <div class="activity_bell"></div>
                        <div class="activity_wrap">
                            <h6><?=$donation['date'];?></h6>
                            <?php 
                                if($user[0]['type'] == 1){
                            ?>
                                <p><?=$user_data[0]['fullname'];?> donate $ <?=$donation['amount'];?> to "<?=$organization_name[0]['name'];?>" community.
                            <?php 
                                }else{
                            ?>
                                <p>$ <?=$donation['amount'];?> donate to "<?=$organization_name[0]['name'];?>" community.
                            <?php 
                                }
                            ?>
                            </p>
                        </div>
                    </li>
                <?php 
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
