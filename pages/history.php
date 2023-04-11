<?php 
    $donations = $community->getHistory($_COOKIE['user']);
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
                ?>
                    <li>
                        <div class="activity_bell"></div>
                        <div class="activity_wrap">
                            <h6><?=$donation['date'];?></h6>
                            <p>$ <?=$donation['amount'];?> donate to "<?=$organization_name[0]['name'];?>"" community.
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
