<?php $this->loadLayout("role/layout/header");  ?>
<!-- Bootstrap Color Picker -->
<link rel="stylesheet"
    href="<?php echo BASE_URL; ?>static/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/plugins/summernote/summernote-bs4.css">
<!-- -------------------------------------------------------------------------------------------- -->
<br>
<br>
<div class="container">
 
    <?php foreach ($dv as $key => $value) { ?>
    <div class="card border-primary">
        <div class="card-header">
            <h4>แก้ไขรายการแข่งขัน</h4>
        </div>
        <div class="card-body">
            <!-- <h4 class="card-title">Title</h4> -->
            <!-- <p class="card-text">Text</p> -->

            <form action="<?php echo BASE_URL ?>games/editAct" method="post" enctype="multipart/form-data">
                <input type="hidden" name="game_id" id="game_id" value="<?php echo $value->game_id ?>">
                <div class="form-group">

                    <div class="col-md-12">
                        <label>ชื่อการแข่งขัน</label>
                        <input type="text" required name="game_name" id="game_name"
                            value="<?php echo $value->game_name ?>" class="form-control">
                    </div>
                </div>


                <div class="form-group">

                    <div class="col-md-12">
                        <label>ผู้จัด</label>
                        <input type="text" required name="game_owner" id="game_owner"
                            value="<?php echo $value->game_owner ?>" class="form-control">
                    </div>
                </div>

                <!-- ----------------------------------------------------- -->


                <div class="form-group row">
                    <div class="col-md-6">

                        <label>เริ่มการรับสมัคร</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" required name="apply_start" id="apply_start"
                                value="<?php echo $value->apply_start ?>" class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                im-insert="false">
                        </div>
                        <script type="text/javascript">
                        $.datetimepicker.setLocale('th');

                        $('#apply_start').datetimepicker({
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

                        <label>สิ้นสุดการรับสมัคร</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" required name="apply_end" id="apply_end"
                                value="<?php echo $value->apply_end ?>" class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                im-insert="false">
                        </div>
                        <script type="text/javascript">
                        $.datetimepicker.setLocale('th');

                        $('#apply_end').datetimepicker({
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
                </div>

                <div class="form-group row">
                    <div class="col-md-6">

                        <label>เริ่มการแข่งขัน</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" required name="game_start" id="game_start"
                                value="<?php echo $value->game_start ?>" class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                im-insert="false">
                        </div>
                        <script type="text/javascript">
                        $.datetimepicker.setLocale('th');

                        $('#game_start').datetimepicker({
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

                        <label>สิ้นสุดการแข่งขัน</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" required name="game_end" id="game_end"
                                value="<?php echo $value->game_end ?>" class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                im-insert="false">
                        </div>
                        <script type="text/javascript">
                        $.datetimepicker.setLocale('th');

                        $('#game_end').datetimepicker({
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



                </div>
                <!-- ----------------------------------------------------- -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">สถานที่จัดการแข่งขัน</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>

                            <input type="text" required name="game_location" id="game_location"
                                value="<?php echo $value->game_location ?>" class="form-control">

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="">พิกัดสถานที่จัดการแข่งขัน</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>

                            <input type="text" name="map_location" id="map_location"
                                value="<?php echo $value->map_location ?>" class="form-control">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">จังหวัด</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <input type="hidden" name="province_id" id="province_id"
                                value="<?php echo $value->province_id ?>" class="form-control">

                            <input type="text" readonly name="province_name" id="province_name"
                                value="<?php echo $value->PROVINCE_NAME ?>" class="form-control">
                            <div class="input-group-append">
                                <!-- <span class="input-group-text" id="">ค้นหา</span> -->
                                <a id='popSearch' class="input-group-text"
                                    href="<?php echo BASE_URL ?>/th/provincelist">ค้นหา </a>
                            </div>
                        </div>
                    </div>



                </div>

                <!-- ----------------------------------------------------- -->
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">ค่าสมัคร(เดี่ยว)</label>
                        <input type="text" required name="pay1player" id="pay1player"
                            value="<?php echo $value->pay1player ?>" value="0" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">ค่าสมัคร(ทีม)</label>
                        <input type="text" required name="pay2player" id="pay2player"
                            value="<?php echo $value->pay2player ?>" value="0" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">ค่าคูปอง</label>
                        <input type="text" required name="game_money" id="game_money"
                            value="<?php echo $value->game_money ?>" value="0" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="">ชำระค่าสมัครได้ถึงวันที่</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" required name="pay_end" id="pay_end"
                                value="<?php echo $value->pay_end ?>" class="form-control" autocomplete="off"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                im-insert="false">
                        </div>
                        <script type="text/javascript">
                        $.datetimepicker.setLocale('th');

                        $('#pay_end').datetimepicker({
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>เลือกสีลงปฎิทิน:</label> 
                            <input type="text" name="color"autocomplete="off" id="color" value="<?php echo $value->color ?>"
                                class="form-control my-colorpicker1">
                        </div>
                    </div>

                </div>

                <!-- ----------------------------------------------------- -->
                <div class="form-group row">
                    <div class="col-md-6"> </div>

                </div>
                <!-- ----------------------------------------------------- -->

                <div class="form-group row">


                    <div class="col-md-12">
                        <label>รายละเอียด</label>
                        <textarea class="textarea" rows="10"
                            name="game_description">   <?php echo $value->game_description ?></textarea>
                    </div>


                </div>




                <!-- <div class="form-group">
                    <label for="exampleInputFile">โปรสเตอร์การแข่งขัน</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileUpload" id="fileUpload">
                            <label class="custom-file-label" for="fileUpload">Choose file</label>
                        </div>
                        
                    </div>
                </div> -->
                <!-- ----------------------------------------------------- -->
                <div class="form-group">
                    <p class="text-center">
                        <input type="submit" value="แก้ไขข้อมูลแข่งขัน" class="btn btn-primary btn-lg">
                    </p>
                </div>

            </form>



        </div>
    </div>

</div>
<?php } ?>
<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>

<!-- Summernote -->
<script src="<?php echo BASE_URL; ?>static/plugins/summernote/summernote-bs4.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo BASE_URL; ?>static/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
$(function() {
    // Summernote
    $('.textarea').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    })
})
</script>
<script>
//Colorpicker
$('.my-colorpicker1').colorpicker()
//color picker with addon
$('.my-colorpicker2').colorpicker()

$('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
});
</script>