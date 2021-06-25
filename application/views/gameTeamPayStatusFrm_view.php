<?php $this->loadLayout("role/layout/header_blank");  ?>
<!-- Bootstrap Switch -->
<script src="<?php echo BASE_URL; ?>static/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/lugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">สถานะการจ่ายเงิน</h3>
    </div>
    <?php 
    foreach ($dv as $key => $value) {
        $x_gr_id = $value->gr_id;
    $x_game_name = $value->game_name;     
    $x_team_name = $value->team_name;   
    $x_IsPay = $value->IsPay;  
    $x_payDate = $value->pay_date;

if($value->pay_date == ""){
    $payDate = "";  //date("Y-m-d");
} else {
    $payDate = $value->pay_date;
}

    }
 
?>


    <div class="card-body">

        <h4>ชื่อทีม: <?php echo $x_team_name; ?></h4>



        <form action="<?php echo BASE_URL; ?>gamestatus/gameTeamPayStatusAct" method="POST">
        <input type="hidden" name="gr_id" id="gr_Id" value="<?php echo $x_gr_id; ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>สถานะการจ่ายเงิน  <?php echo $x_IsPay; ?>  </label>
                        <!-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> -->
                        <input type="checkbox" name="IsPay" id="IsPay" 
                            class="form-control" 
                           <?php if ($x_IsPay == 1){echo "checked";} else {echo "";} ?>
                            data-bootstrap-switch
                            data-on-text="จ่ายแล้ว" data-off-text="ยังไม่จ่าย" 
                            data-off-color="danger"
                            data-on-color="success">

                    </div>
                    <style>
.bootstrap-switch-large{
    width: 100px;
}
                    </style>
                </div>
                <div class="col-md-6 form-group">

                    <label>วันที่จ่าย</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <div class="input-group-prepend">

                            <input type="text" name="pay_date" id="pay_date" 
                                value="<?php echo $payDate; ?>"
                                class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" 
                                data-mask=""
                                im-insert="false">
                        </div>
                    </div>

                </div>


            </div>

            <div class="row">
                <div class="col-md-4">ผู้บันทึกการจ่าย</div>
                <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $value->pay_user_name; ?>" readonly name="pay_create_user_id" id="pay_create_user_id"></div>
                <div class="col-md-4">วันที่บันทึกการจ่าย</div>
                <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $value->pay_date; ?>" readonly name="pay_create_date" id="pay_create_date"></div>

            </div>
            <hr>
            <p class="text-center ">
                <input type="submit" value="บันทึก" class="btn btn-primary">
            </p>
        </form>

        <br>

        <script type="text/javascript">
        $.datetimepicker.setLocale('th');

        $('#pay_date').datetimepicker({
            // yearOffset: 543,
            lang: 'th',
            timepicker: false,
            format: 'Y-m-d',
            formatDate: 'Y-m-d'
            // minDate: '-1970/01/02', // yesterday is minimum date
            //  maxDate: '+1970/01/02' // and tommorow is maximum date calendar
        });
        </script>

        <?php $this->loadLayout("role/layout/footer_blank");  ?>

        <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        </script>
    </div>
    <div class="card-footer">
        <p class="small">กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนเสมอ</p>
        <!-- Pay update by : <br>
        pay update date : -->

    </div>
</div>