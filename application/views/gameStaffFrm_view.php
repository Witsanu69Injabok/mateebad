<?php $this->loadLayout("role/layout/header");  ?>
<br>
<br>
<?php
 $this->loadLayout("role/layout/menu_staff");      
?>
<div class="card-primary">

    <div class="card-header">ผู้ดูแลการแข่งขัน</div>
    <div class="card-body">

        <form action="<?php echo BASE_URL ?>games/gameStaffAct" method="post">
            <input type="hidden" name="game_id" id="game_id" value="<?php echo $id ?>">
            <div class='row'>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ชื่อ-สกุล </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-astronaut"></i></span>
                            </div>
                            <input type="hidden" value="0" name="user_id" id="user_id" class="form-control">

                            <input type="text" required name="user_name" id="user_name" class="form-control">
                            <div class="input-group-append">
                                <!-- <span class="input-group-text" id="">ค้นหา</span> -->
                                <a id='popSearch' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/users/UserPopUp/3">ค้นหา </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <div class="form-group">
                        <label for="">เบอร์โทร </label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div> -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">หมายเหตุ </label>
                        <input type="text" name="owner_description" id="owner_description" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">อนุมัติ </label>
                        <!-- <input type="text" name="" id="" class="form-control"> -->
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            name="IsApprove" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected="selected" data-select2-id="1" value="0">ไม่ได้</option>
                            <option data-select2-id="2" value="1">ได้</option>

                        </select>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <br>
                        <input type="submit" value="บันทึก" class="btn btn-success">
                    </div>
                </div>

            </div>




            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ชื่อ-สกุล</th>
                                <th>หมายเหตุ</th>
                                <th>อนุมัติ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dv as $key => $value) {   ?>
                            <tr>
                                <td scope="row"><?php echo $value->user_fullname; ?></td>
                                <td><?php echo $value->owner_description; ?></td>
                                <td>
                                    <?php //echo $value->IsApprove; ?>
                                    <?php if ($value->IsApprove == 1) { echo "ได้"; } else {echo "ไม่ได้";} ?>
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning">แก้ไข</a>


                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>







        </form>



    </div>
    <div class="card-footer">
        .
    </div>
</div>








<?php $this->loadLayout("role/layout/footer");  ?>