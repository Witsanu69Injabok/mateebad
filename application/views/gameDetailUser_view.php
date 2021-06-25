<?php $this->loadLayout("role/layout/header");  ?>

<?php

    foreach ($dv as $key => $value) {
       

        $x_img = $value->game_img;
        $game_id = $value->game_id;
        $game_code = $value->game_code;
        $x_description = $value->game_description;
        $_SESSION["game_id"] = $game_id;
        $_SESSION["game_code"] = $game_code;
?>
<br>
<br>
<h3><?php echo $value->game_name; ?></h3>
<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                            aria-selected="true">รายละเอียดการแข่งขัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                            href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                            aria-selected="false">สถานที่จัดการแข่งขัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                            href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                            aria-selected="false">ประเภทการแข่งขัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                            href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                            aria-selected="false">รายละเอียดเพิ่มเติม</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">

                        <!--Start พื้นที่แสดงรายละเอียดการแข่งขัน -->


                        <div class="row">
                            <div class="col-md-6">
                                <h4>รายละเอียดการแข่งขัน</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <!-- <a href="<?php echo BASE_URL ?>games/editFrm/<?php echo $value->game_id; ?>"
                                    class="btn btn-primary btn-sm"> จัดการข้อมูล</a> -->
                            </div>
                        </div>

                        <div class="row mx-auto">
                            <div class="col-md-2 border-right text-bold   mx-auto">ผู้จัด</div>
                            <div class="col-md-10"><?php echo $value->game_owner; ?> </div>
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
                            <div class="col-md-2 border-right text-bold   mx-auto">ค่าสมัคร</div>
                            <div class="col-md-2"> เดี่ยว <?php echo $value->pay1player; ?> </div>
                            <div class="col-md-2"> ทีม <?php echo $value->pay2player; ?> </div>
                            <div class="col-md-2 border-right text-bold   mx-auto">ค่าคูปอง</div>
                            <div class="col-md-4"> <?php echo $value->game_money; ?> </div>

                        </div>


                        <!-- ------------------------------------------ -->
                        <div class="row mx-auto">
                            <div class="col-md-2 border-right text-bold   mx-auto">ชำระค่าสมัครได้ถึงวันที่
                            </div>
                            <div class="col-md-10"> <?php echo $value->pay_end; ?> </div>
                        </div>
                        <hr>
                        <div class="row mx-auto">
                            <div class="col-md-12">
                                <h4>โปรสเตอร์การแข่งขัน</h4>

                                <img src="<?php echo BASE_URL; ?>static/uploads/<?php echo $x_img; ?>" class="img-fluid"
                                    alt="Responsive image">
                            </div>

                        </div>
                    </div>
                    <!-- End พื้นที่แสดงรายละเอียดการแข่งขัน -->

                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">
                        <!-- start สถานที่จัดการแข่งขัน -->

                        <div class="row mx-auto">
                            <div class="col-md-2 border-right text-bold   mx-auto">สถานที่จัดการแข่งขัน
                            </div>
                            <div class="col-md-10"><?php echo $value->game_location; ?> </div>
                        </div>
                        <!-- ------------------------------------------ -->

                        <div class="row mx-auto">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div id="map">
                                    <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

                                    <iframe src="<?php echo $value->map_location; ?>" width="100%" height="500px"
                                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                        tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- ------------------------------------------ -->


                        <!-- End สถานที่จัดการแข่งขัน -->

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-one-messages-tab">
                        <!-- ประเภทการแข่งขัน -->

                        <div class="row">
                            <div class="col-md-6">
                                <h4>ประเภทการแข่งขัน</h4>
                            </div>

                        </div>
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>ประเภท</th>
                                    <th>มือ</th>
                                    <th>ค่าสมัคร</th>
                                    <th>จำนวนที่รับ</th>
                                    <th>หมายเหตุ</th>

                                    <th>ชนะเลิศ</th>
                                    <th>รองชนะเลิศ</th>
                                    <th>รองชนะเลิศอันดับ2</th>
                                    <th>รองชนะเลิศอันดับ2</th>
                                    <th>หมายเหตุ</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                foreach ($dvtype as $key => $value) {
                                                    $x_gt_type = "";
                                                    if ($value->gt_type == 1){
                                                        $x_gt_type = "เดี่ยว";
                                                    } else  if ($value->gt_type == 2){
                                                        $x_gt_type = "ทีม";
                                                    }else {
                                                        $x_gt_type = "N/A";
                                                    }
                                               
                                            ?>

                                <tr>
                                    <td scope="row"><?php echo $x_gt_type; ?> </td>
                                    <td><?php echo $value->gt_hand_name; ?></td>
                                    <td><?php echo $value->gt_pay; ?></td>
                                    <td><?php echo $value->gt_total_apply; ?></td>
                                    <td><?php echo  $value->gt_description;?></td>

                                    <td style="text-align: right;"><?php echo   $value->rank1 ; ?></td>
                                    <td style="text-align: right;"><?php echo $value->rank2 ; ?></td>
                                    <td style="text-align: right;"><?php echo  $value->rank3 ; ?></td>
                                    <td style="text-align: right;"><?php echo  $value->rank4 ; ?></td>
                                    <td><?php echo  $value->rank_description;?></td>
                                    <td>
                                        <?php if($value->gt_type  == 1) { ?>
                                        <a href="<?php echo BASE_URL ?>games/gameRegis1PlayerFRM/<?php echo $game_id .  "/" .  $value->gt_id; ?>"
                                            id="pop6060" class="btn btn-success">สมัครเข้าร่วมการแข่งขัน</a>

                                        <?php } ?>
                                        <?php if($value->gt_type  == 2) { ?>
                                            <a href="<?php echo BASE_URL ?>games/gameRegis2PlayerFRM/<?php echo $game_id .  "/" .  $value->gt_id; ?>"
                                             class="btn btn-success">สมัครเข้าร่วมการแข่งขัน</a>

                                        <?php } ?>


                                    </td>

                                </tr>
                                <?php   } ?>
                            </tbody>
                        </table>
                        <!-- end ประเภทการแข่งขัน -->

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                        aria-labelledby="custom-tabs-one-settings-tab">
                        <!-- ------------------------------------------ -->


                        <div class="row mx-auto">

                            <div class="col-md-12">
                                <h4>รายละเอียดเพิ่มเติม</h4>

                                <?php echo $x_description; ?>
                            </div>
                        </div>

                        <!-- ------------------------------------------ -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>
<?php } ?>
<?php $this->loadLayout("role/layout/Footer");  ?>