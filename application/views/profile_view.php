<?php $this->loadLayout("role/layout/header");  ?>
<?php

$tmp_code = intval($_SESSION["user_id"])  ;
$tmp_code = str_pad($tmp_code, 5, "0", STR_PAD_LEFT);
?>
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
<!-- ***** Welcome Area Start ***** -->
<section class="section" id="services">





<div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $x_user_fullname; ?></h3>
                <h5 class="widget-user-desc"> <?php echo $x_user_nickname; ?> </h5>
              </div>
              <div class="widget-user-image">
                <!-- <img class="img-circle elevation-4" src="<?php echo BASE_URL; ?>static/uploads/<?php echo $x_user_img; ?>" alt="User Avatar"> -->
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text"> การแข่งขัน</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">77</h5>
                      <span class="description-text">ชนะ</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3  border-right">
                    <div class="description-block">
                      <h5 class="description-header">88</h5>
                      <span class="description-text">แพ้</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header">99</h5>
                      <span class="description-text">เสมอ</span>
                    </div>
                    <!-- /.description-block -->
                  </div>



                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>












    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">

                <hr>
                <div class="container-fluid">
                    <h4>User profile </h4>

                    <!-- <p class="text-center">กรุณากรอกรายละเอียดเพื่อสร้างบัญชีผู้ใช้</p> -->
                   
                    <style>
                    .required:after {
                        content: " *";
                        color: red;
                    }
                    </style>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card  my-2">
                                <div class="card-header text-center">User Code : # <?php echo $x_user_code; ?> </div>
                                <div class="card-body">

                                    <div class="text-center">
                                        <img src="<?php echo BASE_URL; ?>static/uploads/<?php echo $x_user_img; ?>"
                                            class="w-100 rounded mx-auto d-block">




                                    </div>
                                    <div class="text-center">
                                        <h4><?php echo $x_user_fullname; ?></h4>
                                        <!-- <h6>file : <?php echo $x_user_img; ?></h6> -->

                                    </div>

                                    <div class="text-center">
                                        <a href="<?php echo BASE_URL; ?>imgUpload/uploadfrm/<?php echo $x_user_id; ?>"
                                            id='pop6060' class="btn btn-primary btn-pill btn-sm ">เปลี่ยนภาพ</a>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-8">

                            <div class="card my-2">
                                <div class="card-header text-center">User Detail </div>
                                <div class="card-body">
                                    <form method="POST" action = "<?php echo BASE_URL ?>lvUser/profile_update" onSubmit="return checkPassword(this)">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $x_user_id; ?>">
                                        <div class="row form-group">

                                            <div class="col-md-12">
                                                <label>เลขบัตรประชาชน </label>
                                                <input type="text" class="form-control" value="<?php echo $x_idcard ?>"
                                                    name="idcard" id="idcard">
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <label>line id </label>
                                                <input type="text" class="form-control" name="user_line" id="user_line">
                                       
                                       
                                        -->
                                            </div>


                                            <div class="col-md-8">
                                                <label>ชื่อ </label>
                                                <input type="text" class="form-control request"
                                                    value="<?php echo $x_user_fullname; ?>" name="user_fullname"
                                                    id="user_fullname">
                                            </div>
                                            <div class="col-md-4">
                                                <label>ชื่อเล่น </label>
                                                <input type="text" class="form-control" name="user_nickname"
                                                    value="<?php echo $x_user_nickname ?>" id="user_nickname">
                                            </div>


                                            <div class="col-md-6">
                                                <label>วันเดือนปีเกิด </label>
                                                <input type="text" class="form-control" name="user_birth"
                                                    value="<?php echo $x_user_birth; ?>" id="user_birth">



                                                    <script type="text/javascript">
                    $.datetimepicker.setLocale('th');

                    $('#user_birth').datetimepicker({
                        // yearOffset: 543,
                        lang: 'th',
                        timepicker: false,
                        format: 'Y-m-d',
                        formatDate: 'Y-m-d'
                        // minDate: '-1970/01/02', // yesterday is minimum date
                        //  maxDate: '+1970/01/02' // and tommorow is maximum date calendar
                    });
                    </script>



                                            </div>
                                            <div class="col-md-6">
                                                <label>เพศ </label>
                                                <!-- <input type="text" class="form-control" name="user_sex" id="user_sex"> -->
                                                <div>
                                                    <input type="radio" <?php if ($x_user_sex == 1  or  $x_user_sex == ''){ echo "checked";} ?>
                                                        name="user_sex" id="user_sex" value="1"> ชาย


                                                    <input type="radio" <?php if ($x_user_sex == 2){ echo "checked";} ?>
                                                        name="user_sex" id="user_sex" value="2"> หญิง

                                                </div>
                                                <!-- <select class="form-control" name="user_sex" id="user_sex">
                                                    <option selected=""> กรุณาระบุเพศ</option>
                                                    <option value="1">ชาย</option>
                                                    <option value="2">หญิง</option>
                                                    <option value="3">ไม่ระบุ</option> -->
                                                </select>

                                            </div>
                                            <div class="col-md-6">
                                                <label>อีเมล์ </label>
                                                <input type="email" class="form-control" name="user_email"
                                                   value="<?php echo $x_user_email; ?>" id="user_email">
                                            </div>
                                            <div class="col-md-6">
                                                <label>เบอร์โทร </label>
                                                <input type="text" class="form-control" 
                                                value="<?php echo $x_user_tel; ?>"
                                                name="user_tel" id="user_tel">
                                            </div>


                                            <div class="col-md-12">
                                                <label>ประวัติการแข่งขัน </label>
                                                <input type="text" class="form-control" 
                                                
                                                value="<?php echo $x_user_comment; ?>"
                                                name="user_comment" id="user_comment">
                                            </div>

                                        </div>



                                        
                                        <br>
                                        <br>
                                        <p class="text-center">
                                            <input type="submit" value=" บันทึก " class="btn btn-primary text-center">
                                        </p>
                                    </form>
                                </div>

                            </div>


                        </div>

                    </div>









                </div>

                <script>
                function validateEmail(email) {
                    const re =
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(String(email).toLowerCase());
                }




                function checkPassword(form) {

                    UserFullName = form.user_fullname.value;
                    UserEmail = form.user_email.value;
                    UserTel = form.user_tel.value;
                    p_iPID = form.idcard.value;
                    // alert("full = " + UserFullName + "  email = " + UserEmail + " tel = " + UserTel);

                    // chkDigitPid(p_iPID);

                    if (p_iPID == '') {
                        Swal.fire({
                            title: 'Infomation!',
                            text: 'กรุณากรอกเลขบัตรประชาชน',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;

                    } else if (UserFullName == '') {

                        Swal.fire({
                            title: 'Infomation!',
                            text: 'กรุณากรอกชื่อ-สกุล',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    } else if (UserEmail == '') {
                        // alert("กรุณากรอกอีเมล์");
                        Swal.fire({
                            title: 'Infomation!',
                            text: 'กรุณากรอกอีเมล์',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    } else if (UserTel == '') {
                        // alert("กรุณากรอกเบอร์โทร");
                        Swal.fire({
                            title: 'Infomation!',
                            text: 'กรุณากรอกเบอร์โทร',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    }

                    // If same return True. 
                    else {
                        //alert("Password Match: Welcome to GeeksforGeeks!")
                        return true;
                    }
                }
                </script>


                <style>
                .gfg {
                    font-size: 40px;
                    color: green;
                    font-weight: bold;
                    text-align: center;
                }

                .geeks {
                    font-size: 17px;
                    text-align: center;
                    margin-bottom: 20px;
                }
                </style>



            </div>
        </div>
    </div>
    <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


</section>

<?php $this->loadLayout("role/layout/footer");  ?>


<script>
function chkDigitPid(p_iPID) {
    var total = 0;
    var iPID;
    var chk;
    var Validchk;
    iPID = p_iPID.replace(/-/g, "");
    Validchk = iPID.substr(12, 1);
    var j = 0;
    var pidcut;
    for (var n = 0; n < 12; n++) {
        pidcut = parseInt(iPID.substr(j, 1));
        total = (total + ((pidcut) * (13 - n)));
        j++;
    }

    chk = 11 - (total % 11);

    if (chk == 10) {
        chk = 0;
    } else if (chk == 11) {
        chk = 1;
    }
    if (chk == Validchk) {
        // alert("ระบุหมายเลขประจำตัวประชาชนถูกต้อง");
        Swal.fire({
            title: 'Infomation!',
            text: 'ระบุหมายเลขประจำตัวประชาชนถูกต้อง',
            icon: 'warning',
            confirmButtonText: 'OK'
        })
        // return true;
    } else {
        // alert("ระบุหมายเลขประจำตัวประชาชนไม่ถูกต้อง");
        Swal.fire({
            title: 'Infomation!',
            text: 'ระบุหมายเลขประจำตัวประชาชนไม่ถูกต้อง',
            icon: 'warning',
            confirmButtonText: 'OK'
        })
        // return false;
    }

}
</script>