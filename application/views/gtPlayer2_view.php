<?php $this->loadLayout("role/layout/header");  ?>
<br>
<br>
<h3>::รายชื่อนักกีฬา</h3>
<div class="card border-primary">

    <div class="card-body">
        <!-- <h4 class="card-title">Title</h4> -->
        <!-- <p class="card-text">Text</p> -->
        <a href="<?php echo BASE_URL ?>player/StaffAddPlayer/<?php echo $gtypeid; ?>"
            class="btn btn-success">เพิ่มผู้สมัคร</a>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ลำดับ</th>
                    <th>ประเภท</th>
                    <th>มือ</th>
                    <th>จำนวนที่รับสมัคร</th>
                    <th>จำนวนผู้สมัคร</th>
                    <th>จำนวนผู้จ่ายเงิน</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                $CountRow = 1;
                    foreach ($gdv as $key => $gvalue) {
                       
                    
                ?>
                <tr>
                    <td scope="row"><?php echo $CountRow++; ?></td>
                    <td>
                        <?php
                            if($gvalue->gt_type == 2){
                                echo "ทีม";
                            } else {
                
                                echo "เดี่ยว";
                            }
                        ?>
                    </td>
                    <td class="text-center"><?php echo $gvalue->gt_hand_name;  ?></td>
                    <td class="text-center"><?php echo $gvalue->gt_total_apply;  ?></td>
                    <td class="text-center"><?php echo $gvalue->total_apply;  ?></td>
                    <td class="text-center"><?php echo $gvalue->total_pay;  ?></td>

                </tr>
                <?php } ?>

            </tbody>
        </table>
        <hr>
        <h5>รายชื่อนักกีฬา</h5>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อทีม</th>
                    <th scope="col">ผู้เล่น 1</th>
                    <th scope="col">ผู้เล่น 2</th>
                    <th scope="col">จ่ายเงิน</th>
                    <th scope="col">ตรวจสอบ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dv as $key => $value) { ?>
                <tr>
                    <th scope="row"><?php echo $value->gr_id; ?></th>
                    <td><?php echo $value->team_name; ?></td>
                    <td><?php echo $value->name1; ?></td>
                    <td><?php echo $value->name2; ?></td>
                    <?php  if($value->IsPay == 1)   {
                                $xPay = "จ่ายแล้ว";
                                $xBg = "bg-green";
                            } else {
                                $xBg = "bg-warning";
                                $xPay = "ยังไม่จ่าย";
                            } ?>
                    <td><?php echo $value->IsPay; ?>

                        <div class="input-group">
                            <input type="text" name="" readonly id="" value="<?php echo $xPay; ?>"
                                class="form-control  <?php echo $xBg ?>">
                            <div class="input-group-append">
                                <a id='pop6060' class="input-group-text"
                                    href="<?php echo BASE_URL ?>gamestatus/gameTeamPayStatusFrm/<?php echo $value->gr_id; ?>">
                                    เปลี่ยน </a>
                            </div>
                        </div>


                    </td>
                    <td><?php echo $value->IsApprove; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>










        <hr>
        <?php foreach ($dv as $key => $value) {
                $user_name1 =  $value->user_name1;
       ?>

        <div class="row" style="padding: 20px;">
            <div class="col-md-12">


                <div class="row">
                    <div class="col-md-6">
                        <!-- <h5>ชื่อทีม : <?php echo $value->team_name; ?> </h5> -->
                        <label for="">ชื่อทีม</label>

                        <input type="text" name="" readonly id="" class="form-control bg-teal"
                            value="<?php echo $value->team_name; ?>">

                    </div>
                    <div class="col-md-3">
                        <label for="">สถานะการจ่ายเงิน</label>

                        <?php
                            if($value->IsPay == 1)   {
                                $xPay = "จ่ายแล้ว";
                                $xBg = "bg-green";
                            } else {
                                $xBg = "bg-warning";
                                $xPay = "ยังไม่จ่าย";
                            }
                            ?>

                        <div class="input-group">
                            <input type="text" name="" readonly id="" value="<?php echo $xPay; ?>"
                                class="form-control  <?php echo $xBg ?>">
                            <div class="input-group-append">
                                <a id='pop6060' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/gamestatus/gameTeamPayStatusFrm/<?php echo $value->gr_id; ?>">
                                    เปลี่ยน </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">สถานะการตรวจสอบ</label>
                        <?php
                            if($value->IsApprove == 1)   {
                                $xStatus = "ตรวจสอบแล้ว";
                                $xBg = "bg-green";
                            } else {
                                $xBg = "bg-warning";
                                $xStatus = "รอการตรวจสอบ";
                            }
                            ?>
                        <div class="input-group">
                            <input type="text" name="" readonly id="" value="<?php echo $xStatus; ?>"
                                class="form-control  <?php echo $xBg ?>">
                            <div class="input-group-append">
                                <a id='popSearch' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/th/provincelist"> แก้ไข </a>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
            <!-- PLAYER 1 -->
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-6">

                        <img class="img-fluid img-thumbnail"
                            src="<?php echo BASE_URL ?>static/uploads/<?php echo $value->user_img1; ?>">

                    </div>

                    <div class="col-md-6">
                        ชื่อ-สกุล : <?php echo $value->user_name1; ?> <br>
                        เพศ : xx <br>
                        อายุ : xxx <br>
                        มือ : xxxx <br>

                    </div>

                </div>

            </div>
            <!-- PLAYER 2 -->
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-6">

                        <img class="img-fluid img-thumbnail"
                            src="<?php echo BASE_URL ?>static/uploads/<?php echo $value->user_img2; ?>">

                    </div>

                    <div class="col-md-6">
                        ชื่อ-สกุล : <?php echo $value->user_name2; ?> <br>
                        เพศ : xx <br>
                        อายุ : xxx <br>
                        มือ : xxxx <br>

                    </div>

                </div>

            </div>


        </div>

        <?php
    } ?>




    </div>
</div>






<?php $this->loadLayout("role/layout/footer");  ?>