<div class="card-group">
<div class="card">
        <img src="<?=HOST;?>/<?=$thisCommunity[0]['photo'];?>" height="500" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?=$thisCommunity[0]['name'];?></h5>
        <p class="card-text"><?=$thisCommunity[0]['description'];?></p>
        </div>
        <div class="card-footer">
        <small class="text-muted">
        <?php 
            if($user[0]['type'] == 0){
        ?>
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
                <input type="hidden" name="community_id" value="<?=$thisCommunity[0]['id'];?>">
                <div class="form-group">
                    <input type="text" class="form-control" style="display:inline-block; width:50%;" name="donate_amount" placeholder="Amount (ex: 250)">
                    <button type="submit" class="btn_1 full_width text-center" style="display:inline-block;">Donate</button>
                </div>
            </form>
            <?php
                }else{
            ?>
                <h4>Total: $ <?=$thisCommunity[0]['balance'];?></h4>
            <?php
                }
            ?>
        </small>
        </div>
    </div>
</div>