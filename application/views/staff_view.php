<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->


<?php
foreach ($dt as $key => $value) {
    $x_user_id = $value->user_id;
    $x_user_fullname = $value->user_fullname;
    $x_user_code = $value->user_code;
    $x_user_img = $value->user_img;
    $x_user_nickname = $value->user_nickname;
    $x_idcard = $value->idcard;
    $x_user_email = $value->user_email;
    $x_user_tel = $value->user_tel;
    $x_user_sex = $value->user_sex;
    $x_user_birth = $value->user_birth;
    $x_user_comment = $value->user_comment;
 
 }
 

?>


<div class="col-md-12">
    <div class="card card-widget widget-user success">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
            <h3 class="widget-user-username"><?php echo $x_user_fullname; ?></h3>
            <h5 class="widget-user-desc"> <?php echo $x_user_nickname; ?> </h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle elevation-4 w-40"
                src="<?php echo BASE_URL; ?>static/uploads/<?php echo $x_user_img; ?>" alt="User Avatar">
        </div>
    </div>

    <section class="contact">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">รายการจัดการแข่งขัน</h3>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            <li><a class="btn btn-success sm" href="#"><i class="fas fa-plus-circle"> </i>
                                    เพิ่มรายการแข่งขัน</a></li>
                            <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>รายการแข่งขัน</th>
                                <th>สถานะการชำระเงิน</th>
                                <th>สถานะ</th>

                                <th>จำนวนผู้สมัคร</th>

                                <th style="width: 40px"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
foreach ($dv as $key => $value) {
 

?>
                            <tr>
                                <td><?php echo $value->game_id; ?></td>
                                <td><?php echo $value->game_name; ?></td>


                                <td>
                                    <?php
                                    
                                    if ($value->pay_status == 1){
                                        echo "";
?>
                                    <span class='btn bg-success'> ชำระแล้ว </span>

                                    <?php 

                                    } else {
                                        //echo "<span class='btn bg-danger'> ยังไม่ชำระ </span> ";
                                        ?>
                                    <!-- <span class=class='btn bg-danger'> ยังไม่ชำระ </span> -->
                                    <a href='<?php echo BASE_URL; ?>uploads/sliptFrm/<?php echo $value->game_id; ?>'  id='pop6060' class='btn btn-warning'>แจ้งชำระเงิน</a>
                                    <?php 


                                    }
                                ?>
                                </td>
                                <td>
                                    <?php
                                    if ($value->game_status == 1){
                                        echo "<span class='btn bg-success'> เปิดการแข่งขัน </span> ";
                                    } else {
                                        echo "<span class='btn bg-danger'> ปิดการแข่งขัน </span> ";
                                    }
                                ?>

                                </td>
                                <td>99999</td>
                                <td> <a class=" btn bg-info sm"><i class="fas fa-info-circle"> รายละเอียด </i></a> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
        </div>




    </section>



    <!-- -------------------------------------------------------------------------------------------- -->

    <?php $this->loadLayout("role/layout/footer"); ?>