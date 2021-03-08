<?php $this->loadLayout("role/layout/header");  ?>
<br>
<br>


<form action="" method="post">
    <input type="hidden" name="game_id" id="game_id" value="<?php echo $gid ?>">
    <input type="hidden" name="gt_id" id="gt_id" value="<?php echo $gtid ?>">
    <div class="card">
        <div class="card-header">
            <h4>ลงทะเบียนเข้าร่วมการแข่งขัน</h4>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="">ชื่อทีม</label>
                <input type="text" required name="team_name" id="team_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">สมาชิกคนที่ 1</label>
                <input type="hidden" name="user_id1" id="user_id1" value="<?php echo $_SESSION['user_id'] ?>" class="form-control">
                <input type="text" readonly name="user_name1" id="user_name1" value="<?php echo $_SESSION['user_fullname'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="">สมาชิกคนที่ 2</label>
                <div class="input-group">
                    <!-- <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                    </div> -->
                    <input type="hidden" name="user_id" id="user_id" class="form-control">
                    <input type="text" name="user_name" id="user_name" class="form-control">
                    <div class="input-group-append">

                        <a id='popSearch' class="input-group-text" href="<?php echo BASE_URL ?>/users/UserPopUp/2">ค้นหา
                        </a>
                    </div>
                </div>
            </div>




        </div>
        <div class="card-footer">
            <p class="text-center">
                <input type="submit" value="บันทึก" class="btn btn-primary">

            </p>

        </div>

    </div>
</form>



<?php $this->loadLayout("role/layout/footer");  ?>