<?php $this->loadLayout("role/layout/header_blank");  ?>
<h4> </h4>
<?php
//  $this->loadLayout("role/layout/menu_staff");      
// print_r($dv);
foreach ($dv as $key => $value) {
    $x_gt_type = $value->gt_type;
    $x_gt_hand_name = $value->gt_hand_name;

if ($x_gt_type == 1){
    $x_name = "เดี่ยว";
} else {
    $x_name = "ทีม";
}


?>
<form action="<?php echo BASE_URL ?>games/gameTypeEditAct" method="post">
    <input type="hidden" name="game_id" id="game_id" value="<?php echo $id ?>">
    <div class="card">
        <div class="card-header">
            <h4>ประเภทการแข่งขัน/รางวัล</h4>
        </div>

        <div class="card-body">

            <h5>ประเภทการแข่งขัน</h5>
            <div class=" row">

                <div class=" col-md-2">
                    <div class="form-group">
                        <label for="">ประเภท</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            name="gt_type" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected="selected" data-select2-id="1" value="<?php echo $x_gt_type; ?>">
                                <?php echo $x_name; ?></option>
                            <option data-select2-id="2" value="1">เดี่ยว</option>
                            <option data-select2-id="3" value="2">ทีม</option>

                        </select>
                        <!-- <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="gt_type"   id="radioDanger1" vlaue="1">
                                <label for="radioDanger1"> เดี่ยว
                                </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="gt_type" id="radioDanger2" value="2">
                                <label for="radioDanger2"> คู่
                                </label>
                            </div>

                        </div> -->
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="form-group">
                        <label>มือ</label>
                        <div class="input-group">
                            <input type="text" name="gt_hand_name" value="<?php echo $x_gt_hand_name; ?>"
                                id="gt_hand_name" class="form-control">

                        </div>
                    </div>

                </div>

                <div class=" col-md-3">
                    <label for="">ค่าสมัคร</label>
                    <input type="text" name="gt_pay" id="gt_pay" value="<?php echo $value->gt_pay; ?>"
                        class="form-control">
                </div>

                <div class=" col-md-3">
                    <label for="">จำนวนที่รับ</label>
                    <input type="text" name="gt_total_apply" id="gt_total_apply"
                        value="<?php echo $value->gt_total_apply; ?>" class="form-control">
                </div>
                <div class=" col-md-12">
                    <label for="">หมายเหตุ</label>
                    <input type="text" name="gt_description" id="gt_description" value="<?php echo $value->gt_description; ?>"
                        class="form-control">
                </div>
            </div>
            <hr>
            <h5>รางวัล</h5>

            <div class="row">

                <div class="col-md-2">
                    <label for="">รางวัลชนะเลิศ</label>
                    <input type="text" name="rank1" id="rank1" class="form-control"
                        value="<?php echo $value->rank1; ?>">
                </div>
                <div class="col-md-2">
                    <label for="">รางวัลรองชนะเลิศ</label>
                    <input type="text" name="rank2" id="rank2" class="form-control"
                        value="<?php echo $value->rank2; ?>">
                </div>
                <div class="col-md-2">
                    <label for="">รองชนะเลิศอันดับ2</label>
                    <input type="text" name="rank3" id="rank3" class="form-control"
                        value="<?php echo $value->rank3; ?>">
                </div>
                <div class="col-md-2">
                    <label for="">รองชนะเลิศอันดับ2</label>
                    <input type="text" name="rank4" id="rank4" class="form-control"
                        value="<?php echo $value->rank4; ?>">
                </div>
                <div class="col-md-4">
                    <label for="">หมายเหตุ</label>
                    <input type="text" name="rank_description" id="rank_description" class="form-control"
                        value="<?php echo $value->rank_description; ?>">
                </div>
            </div>
            <hr>
            <div class="mx-10 text-right">
                <input type="submit" value="บันทึกรายการ" class="btn btn-primary btn-lg">
            </div>

            <!-- end body   -->
        </div>

</form>

<?php } ?>









<?php $this->loadLayout("role/layout/footer_blank");  ?>