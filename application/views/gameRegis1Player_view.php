<?php $this->loadLayout("role/layout/header_blank");  ?>

<form action="" method="post">
    <input type="hidden" name="game_id" id="game_id" value="<?php echo $gid ?>">
    <input type="hidden" name="gt_id" id="gt_id" value="<?php echo $gtid ?>">
    <div class="card">
        <div class="card-header">
            <h4>ลงทะเบียนเข้าร่วมการแข่งขัน</h4>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="">ชื่อ-สกุล</label>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>" class="form-control">
                <input type="text" readonly name="user_name" id="user_name" value="<?php echo $_SESSION['user_fullname'] ?>" class="form-control">
        
            </div>
        </div>
        <div class="card-footer">
            <p class="text-center">
                <input type="submit" value="บันทึก" class="btn btn-primary">

            </p>

        </div>

    </div>
</form>
<?php $this->loadLayout("role/layout/footer_blank");  ?>