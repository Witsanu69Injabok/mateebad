<?php $this->loadLayout("role/layout/header2");  ?>

<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">


                </div>

                <hr>
                <div class="container-fluid">
                    <h4 class="text-center">สร้างบัญชีผู้ใช้ใหม่</h4>
                    <p class="text-center">กรุณากรอกรายละเอียดเพื่อสร้างบัญชีผู้ใช้</p>
                    <?php  
                    if(@$msg=="Duplicate"){
                        $txt="มีผู้ใข้ชื่อนี้ในระบบแล้ว";
                    }
                        if (@$msg != ""){
                          ?>
                    <script>
                    Swal.fire({
                        title: 'Error!',
                        text: '<?php echo $txt; ?>',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                    </script>

                    <?php
                        }
                    
                    ?>
                    <form action="<?php echo BASE_URL ?>register/register_add" method="POST"
                        onSubmit="return checkPassword(this)">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="user_name" autocomplete="off" class="form-control" placeholder="ชื่อเข้าระบบ" type="text"
                                value="<?php echo @$user_name; ?>">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="user_password1" placeholder="รหัสผ่าน" type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="user_password2" placeholder="ยืนยันรหัสผ่าน"
                                type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-users"></i> </span>
                            </div>
                            <select class="form-control" name="level_id">
                                <option value="0"> ประเภทสมาชิก</option>
                                <option value="2">นักกีฬา</option>
                                <option value="3">ผู้จัด</option>

                            </select>
                        </div>

                        <!-- <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="" class="form-control" placeholder="อีเมล์" type="email">
                        </div> 
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="" class="form-control" placeholder="เบอร์โทรศัพท์ที่ติดต่อได้" type="text">
                        </div> -->
                        <!-- form-group// -->
                        <!-- <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                            </div>
                            <select class="form-control">
                                <option selected=""> กรุณาระบุเพศ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                                <option value="3">ไม่ระบุ</option>
                            </select>
                        </div> -->
                        <!-- form-group end.// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block"> Create Account </button>
                        </div> <!-- form-group// -->
                        <p class="text-center">มีบัญชีผู้ใช้อยู่แล้วหรือไม่? <a href=""
                                class="btn  btn-outline-danger">เข้าสู่ระบบ</a> </p>
                    </form>


                </div>

                <script>
                // Function to check Whether both passwords 
                // is same or not. 
                function checkPassword(form) {
                    password1 = form.user_password1.value;
                    password2 = form.user_password2.value;
                    username = form.user_name.value;
                    levelid = form.level_id.value;

                    if (username == '') {
                        // alert("กรุณากรอกชื่อเข้าระบบ");
                        Swal.fire({
                            title: 'Error!',
                            text: 'กรุณากรอกชื่อเข้าระบบ',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    } else if (levelid == '0') {
                        // alert("กรุณาเลือกประเภทสมาชิก");
                        Swal.fire({
                            title: 'Error!',
                            text: 'กรุณาเลือกประเภทสมาชิก',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    }
                    // If password not entered 
                    else if (password1 == '') {
                        // alert("กรุณากรอกรหัสผ่าน");
                        Swal.fire({
                            title: 'Error!',
                            text: 'กรุณากรอกรหัสผ่าน',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    }
                    // If confirm password not entered 
                    else if (password2 == '') {
                        // alert("กรุณายืนยันรหัสผ่าน");
                        Swal.fire({
                            title: 'Error!',
                            text: 'กรุณายืนยันรหัสผ่าน',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                        return false;
                    }
                    // If Not same return False.     
                    else if (password1 != password2) {
                        // alert("\n รหัสผ่าน และยืนยันรหัสผ่านไม่ตรงกัน")
                        Swal.fire({
                            title: 'Error!',
                            text: 'รหัสผ่าน และยืนยันรหัสผ่านไม่ตรงกัน',
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

<?php $this->loadLayout("role/layout/footer2");  ?>