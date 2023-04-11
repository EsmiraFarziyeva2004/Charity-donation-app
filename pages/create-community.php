
<div class="col-lg-12">
    <div class="white_box mb_30">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="modal-content cs_modal">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Coummunity</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="name" placeholder="Community Name">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Choose community photo</label>
                                <input type="file" style="line-height:24px!important;" class="form-control form-control-sm" name="photo" >
                            </div>
                            <button type="submit" class="btn_1 full_width text-center">Create Coummunity</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 