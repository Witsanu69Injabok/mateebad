<?php $this->loadLayout("role/layout/header");  ?>
<br>
<br>


<form action="<?php echo BASE_URL ?>games/gameRegis2PlayerAct" onSubmit="return checkData(this)" method="post">
    <input type="hidden" name="game_id" id="game_id" value="<?php echo $gid ?>">
    <input type="hidden" name="gt_id" id="gt_id" value="<?php echo $gtid ?>">
    <div class="card">
        <div class="card-header">
            <h4>ลงทะเบียนเข้าร่วมการแข่งขัน</h4>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="">ชื่อทีม</label>
                <input type="text" name="team_name" id="team_name" class="form-control">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">สมาชิกคนที่ 1</label>
                        <div class="input-group">
                            <input type="text" name="user_id1" id="user_id1"
                                value="<?php echo $_SESSION['user_id'] ?>" required class="form-control">
                            <input type="text" readonly name="user_name1" id="user_name1"
                                value="<?php echo $_SESSION['user_fullname'] ?>" class="form-control">
                            <div class="input-group-append">

                                <a id='popSearch' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/users/UserPopUp/2">ค้นหา
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">สมาชิกคนที่ 2</label>
                        <div class="input-group">
                            <input type="text" name="user_id" id="user_id" required class="form-control">
                            <input type="text" name="user_name" readonly id="user_name" class="form-control">
                            <div class="input-group-append">

                                <a id='popSearch' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/users/UserPopUp/2">ค้นหา
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




            </div>


            <div class="card-footer">
                <p class="text-center">
                    <input type="submit" value="ยืนยันการเข้าร่วมการแข่งขัน" class="btn btn-primary">

                </p>

            </div>

        </div>
</form>



<?php $this->loadLayout("role/layout/footer");  ?>


<script>
function checkData(form) {

    teamname = form.team_name.value;
    user_id = form.user_id;
    username = form.user_name.value;

    if (teamname == '') {
        // alert("กรุณากรอกชื่อเข้าระบบ");
        Swal.fire({
            title: 'กรุณากรอกชื่อทีม',
            text: 'ท่านไม่ได้ระบุชื่อทีม กรุณาระบุให้ครบถ้วน',
            icon: 'warning',
            confirmButtonText: 'OK'
        })
        return false;
    }
    if (username == '') {
        // alert("กรุณากรอกชื่อเข้าระบบ");
        Swal.fire({
            title: 'กรุณากรอกชื่อผู้เล่น!',
            text: 'ท่านไม่ได้ระบุชื่อผู้เล่นคู่กับท่าน กรุณาระบุให้ครบถ้วน',
            icon: 'warning',
            confirmButtonText: 'OK'
        })
        return false;
    }



}
</script>