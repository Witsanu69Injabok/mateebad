<?php $this->loadLayout("role/layout/header_blank");  ?>
<div class="card primary">
<?php 
    foreach ($dv as $key => $value) {
        ?>
    <div class="card-header">
        <h3><?php echo $value->game_name; ?></h3>
    </div>
    <div class="card-body">
 <!-- ------------------------------------------ -->

 <div class="row mx-auto">
                                <div class="col-md-2 border-right text-bold   mx-auto">ผู้จัด</div>
                                <div class="col-md-10"><?php echo $value->user_fullname; ?> </div>
                            </div>
                            <!-- ------------------------------------------ -->

                            <div class="row mx-auto">
                                <div class="col-md-2 border-right text-bold   mx-auto">วันที่รับสมัคร</div>
                                <div class="col-md-10">
                                    ตั้งแต่วันที่ <?php echo $value->apply_start; ?>
                                    ถึงวันที่ <?php echo $value->apply_end; ?>

                                </div>
                            </div>
                            <!-- ------------------------------------------ -->

                            <div class="row mx-auto">
                                <div class="col-md-2 border-right text-bold   mx-auto">การแข่งขัน</div>
                                <div class="col-md-10">
                                    ตั้งแต่วันที่ <?php echo $value->game_start; ?>
                                    ถึงวันที่ <?php echo $value->game_end; ?>

                                </div>
                            </div>
                            <!-- ------------------------------------------ -->

                            <div class="row mx-auto">
                                <div class="col-md-2 border-right text-bold   mx-auto">ค่าสมัครเดี่ยว</div>
                                <div class="col-md-2"> <?php echo $value->pay1player; ?> </div>
                                <div class="col-md-2 border-right text-bold   mx-auto">ค่าสมัครทีม</div>
                                <div class="col-md-2"> <?php echo $value->pay2player; ?> </div>
                                <div class="col-md-2 border-right text-bold   mx-auto">ค่าคูปอง</div>
                                <div class="col-md-2"> <?php echo $value->game_money; ?> </div>
                            </div>    
                                
                            <div class="row mx-auto">  
                                <div class="col-md-4 border-right text-bold   mx-auto">ชำระค่าสมัครได้ถึงวันที่
                                </div>
                                <div class="col-md-8"> <?php echo $value->pay_end; ?> </div>
                            </div>


                            <!-- ------------------------------------------ -->

                            <div class="row mx-auto">
                                <div class="col-md-4 border-right text-bold   mx-auto">สถานที่จัดการแข่งขัน
                                </div>
                                <div class="col-md-8"><?php echo $value->game_location; ?> </div>
                            </div>
                            <!-- ------------------------------------------ -->
<?php } ?>

    </div>
    <div class="card-footer"> 
    <p class="text-right">
        <a href="" onclick="JavaScript:parent.$.fancybox.close();" class="btn btn-warning ">ปิดหน้านี้</a>
        <a href="<?php echo BASE_URL; ?>games/gameUserView/<?php echo $value->game_id ?>/<?php echo $ptype ?>" class="btn btn-primary" target="_top">แสดงรายละเอียด </a>
        </p>
    </div>
</div>





<?php $this->loadLayout("role/layout/footer_blank");  ?>