<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="<?=HOST;?>"><img src="<?=HOST;?>/img/logo1.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        <li class="side_menu_title">
            <span>Dashboard</span>
        </li>

        <li class="mm-active">
            <a href="<?=HOST;?>">
                <img src="<?=HOST;?>/img/menu-icon/1.svg" alt="">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="side_menu_title">
            <span>Applications</span>
        </li>

        

        <li class="">
            <a href="<?=HOST;?>/profile">
                <img src="<?=HOST;?>/img/menu-icon/6.svg" alt="">
                <span>Manage Profile</span>
            </a>
        </li>

        <?php 
            if($user[0]['type'] == 0){
        ?>
            <li class="">
                <a href="<?=HOST;?>/history">
                    <img src="<?=HOST;?>/img/menu-icon/3.svg" alt="">
                    <span>Donation History</span>
                </a>
            </li>
        <?php
            }
        ?>


        <?php 
            if($user[0]['type'] == 1){
        ?>
            <li class="">
                <a href="<?=HOST;?>/create-community">
                    <img src="<?=HOST;?>/img/menu-icon/3.svg" alt="">
                    <span>Create Community</span>
                </a>
            </li>
            <li class="">
                <a href="<?=HOST;?>/all-community">
                    <img src="<?=HOST;?>/img/menu-icon/2.svg" alt="">
                    <span>All Community</span>
                </a>
            </li>
        <?php
            }
        ?>

        
        
   
    </ul>
    
</nav>