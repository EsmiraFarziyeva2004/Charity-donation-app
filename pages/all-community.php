<?php 
    foreach($community->getAllCommunity() as $item){
?>
    <div class="card" style="width: 18rem; margin-left:30px; margin-top:30px;">
        <img src="<?=HOST;?>/<?=$item['photo'];?>" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="<?=HOST;?>/community/<?=$item['id'];?>"><h4 class="card-title"><?=$item['name'];?></h4></a>
        </div>
    </div>
<?php 
    }
?>