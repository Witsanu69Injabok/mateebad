<!-- 
    1= font end
    2= back end 
-->

<?php 
//echo "<pre> PTYPE =  $ptype </pre>";
        if($ptype == 1){
           
 ?>
<?php $this->loadLayout("role/layout/header3");  ?>
<div class="container">
    <?php
        } else {
            $this->loadLayout("role/layout/header");              
        }   
?>

    <?php 
       $game_code = "";             
    foreach ($dv as $key => $value) {
        
$x_img = $value->game_img;
$game_id = $value->game_id;
$game_code = $value->game_code;
$_SESSION["game_id"] = $game_id;
$_SESSION["game_code"] = $game_code;
?>
    <div>
        <br>
        <?php
 $this->loadLayout("role/layout/menu_staff");      
?>
<?php include('inc/DateTimeThai.php');?>
    </div>
    <?php //echo $game_code ; ?>
    <div class="btn-group  btn-group-lg" role="group" aria-label="Basic example">
        <!-- <button type="button" class="btn btn-primary">ข้อมูลการแข่งขัน</button>
 
  <a href='<?php echo BASE_URL; ?>games/ImgFrm/<?php echo $value->game_id; ?>'  id='pop6060' class='btn btn-warning'>โปรสเตอร์การแข่งขัน</a>
  <a href='<?php echo BASE_URL; ?>games/gameTypeFrm/<?php echo $value->game_id; ?>'  class='btn btn-info'>ประเภทการแข่งขัน</a>
  
 
  <button type="button" class="btn btn-secondary">ข้อมูลสาย</button>
  <button type="button" class="btn btn-success">ข้อมูลผู้สมัคร</button>
  <button type="button" class="btn btn-primary">ผู้ดูแลการแข่งขัน</button>
  -->
    </div>

    <p></p>

    <div class="card card-primary">

        <div class="card-header">
            <h3><?php echo $value->game_name; ?></h3>
        </div>
        <div class="card-body">
            <!-- ------------------------------------------ -->

            <div class="row">
                <div class="col-md-6">
                    <h4>รายละเอียดการแข่งขัน</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?php echo BASE_URL ?>games/editFrm/<?php echo $value->game_id; ?>"
                        class="btn btn-primary btn-sm"> จัดการข้อมูล</a>
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
                    ตั้งแต่วันที่ <?php echo @DateThai($value->apply_start); ?>
                    ถึงวันที่ <?php echo @DateThai($value->apply_end); ?>

                </div>
            </div>
            <!-- ------------------------------------------ -->

            <div class="row mx-auto">
                <div class="col-md-2 border-right text-bold   mx-auto">การแข่งขัน</div>
                <div class="col-md-10">
                    ตั้งแต่วันที่ <?php echo @DateThai($value->game_start); ?>
                    ถึงวันที่ <?php echo @DateThai($value->game_end); ?>

                </div>
            </div>
            <!-- ------------------------------------------ -->

            <div class="row mx-auto">
                <div class="col-md-2 border-right text-bold   mx-auto">ค่าสมัคร</div>
                <div class="col-md-1"> เดี่ยว <?php echo $value->pay1player; ?> </div>
                <div class="col-md-1"> ทีม <?php echo $value->pay2player; ?> </div>
                <div class="col-md-2 border-right text-bold   mx-auto">ค่าคูปอง</div>
                <div class="col-md-2"> <?php echo $value->game_money; ?> </div>
                <div class="col-md-2 border-right text-bold   mx-auto">ชำระค่าสมัครได้ถึงวันที่
                </div>
                <div class="col-md-2"> <?php echo @DateThai($value->pay_end); ?> </div>
            </div>


            <!-- ------------------------------------------ -->

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
                   
                         <iframe src="<?php echo $value->map_location; ?>" width="100%" height="500px" frameborder="0"
                            style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   
               
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------ -->


            <div class="row mx-auto">

                <div class="col-md-12">
                    <h4>รายละเอียดเพิ่มเติม</h4>
                    <?php echo $value->game_description; ?>
                </div>
            </div>

            <!-- ------------------------------------------ -->
            <hr>
            <div class="row mx-auto">
                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-6">
                            <h4>ประเภทการแข่งขัน</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo BASE_URL ?>games/gameTypeFrm/<?php echo $value->game_id; ?>"
                                class="btn btn-primary btn-sm"> จัดการข้อมูลประเภทการแข่งขัน</a>
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

                                <td><?php echo $value->rank1; ?></td>
                                <td><?php echo $value->rank2; ?></td>
                                <td><?php echo $value->rank3; ?></td>
                                <td><?php echo $value->rank4; ?></td>
                                <td><?php echo  $value->rank_description;?></td>
                                <td>..</td>

                            </tr>
                            <?php   } ?>
                        </tbody>
                    </table>


                </div>

            </div>

            <!-- ------------------------------------------ -->
            <div class="row mx-auto">
                <div class="col-md-12">
                    <h4>โปรสเตอร์การแข่งขัน</h4>

                    <img src="<?php echo BASE_URL; ?>static/uploads/<?php echo $x_img; ?>" class="img-fluid"
                        alt="Responsive image">
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
        if($ptype == 1){
?>



<?php
echo "</div>";

            $this->loadLayout("role/layout/footer2");  

        } else {
            $this->loadLayout("role/layout/footer");              
        }  
?>