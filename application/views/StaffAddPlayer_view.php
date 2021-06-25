<?php $this->loadLayout("role/layout/header");  ?>
<?php 
 
?>
<br>
<br>
<!-- -------------------------------------------------------------------------------------------- -->
<div class="card">
    <div class="card-header">
        <h3>Add New Player by staff </h3>
    </div>
    <div class="card-body">
        <div class="container">

            <form action="<?php echo BASE_URL ?>player/StaffAddPlayer_act" method="post">
            <input type="text" name="game_type_id" id="game_type_id" value="<?php echo $id ?>">
                <div>
                    <label> Team Name</label>
                    <input type="text" name="team_name" required class="form-control" id="team_name">
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Player 1</h5>
                            </div>
                            <div class="card-body">

                                <label> ID Card</label>
                                <div class="input-group">
                                    <input type="text" name="idcard1" required class="form-control" id="idcard1">
                                    <div class="input-group-append">
                                        <a id='popSearch' class="input-group-text"
                                            href="<?php echo BASE_URL ?>/th/provincelist">ค้นหา </a>

                                    </div>
                                </div>
                                <small id="helpId" class="text-danger">
                                    ถ้ามีประวัติแล้วกดปุ่มค้นหาเพื่อเรียกข้อมูลได้เลย</small>
                                <br>
                                <label> Name </label>
                                <input type="text" name="player_name1" required class="form-control" id="player_name1">
                                <label> Nick Name </label>
                                <input type="text" name="player_nickname1" required class="form-control" id="player_nickname1">
                                
                                <label> Tel </label>
                                <input type="text" name="player_tel2" required class="form-control" id="player_tel2">
                                
                                <label> Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        <input type="text" required name="player_birth1" id="player_birth1"
                                            class="form-control" autocomplete="off" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                    </div>
                                    <script type="text/javascript">
                                    $.datetimepicker.setLocale('th');
                                    $('#player_birth1').datetimepicker({
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
                                    <label>SEX</label>
                                    <select name="player_sex1" id="player_sex1"  class="form-control">
                                        <option value="1">ชาย</option>
                                        <option value="2">หญิง</option>                                    
                                    </select>


                            </div>
                        </div>
                    </div>
                    <!-- ----------------------------------------------------------------------------- -->
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                <h5>Player 2</h5>
                            </div>
                            <div class="card-body">
                                <label> ID Card</label>
                                <div class="input-group">
                                    <input type="text" name="idcard2" required class="form-control" id="idcard2">
                                    <div class="input-group-append">
                                        <a id='popSearch' class="input-group-text"
                                            href="<?php echo BASE_URL ?>/th/provincelist">ค้นหา </a>

                                    </div>
                                </div>
                                <small id="helpId" class="text-danger">
                                    ถ้ามีประวัติแล้วกดปุ่มค้นหาเพื่อเรียกข้อมูลได้เลย</small>
                                <br>
                                <label> Name </label>
                                <input type="text" name="player_name2" required class="form-control" id="player_name2">
                                <label> Nick Name </label>
                                <input type="text" name="player_nickname2" required class="form-control" id="player_nickname2">
                                
                                <label> Tel </label>
                                <input type="text" name="player_tel2" required class="form-control" id="player_tel2">
                                
                                <label> Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        <input type="text" required name="player_birth2" id="player_birth2"
                                            class="form-control" autocomplete="off" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                    </div>
                                    <script type="text/javascript">
                                    $.datetimepicker.setLocale('th');
                                    $('#player_birth2').datetimepicker({
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
                                <label>SEX</label>
                                    <select name="player_sex2" id="player_sex2"  class="form-control"> 
                                        <option value="1">ชาย</option>
                                        <option value="2">หญิง</option>                                    
                                    </select>

                            </div>
                        </div>


                    </div>

                </div>





                <p></p>

                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value=" บันทึกข้อมูล " class="btn btn-success btn-lg" style="width: 100%;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div>
    กรุณาตรวจสอบความถูกต้องของข้อมูลก่อนทำการบันทึก

</div>

<br>
<br>
<br>
<br>
<br>




</div>
</div>
</div>

<!-- -------------------------------------------------------------------------------------------- -->


<?php $this->loadLayout("role/layout/footer");  ?>