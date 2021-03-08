<?php $this->loadLayout("role/layout/header_blank");  ?>
<?php
    foreach ($dv as $key => $value) {
        $x_img = $value->game_img;
    }

?>

<div class="card card-primary">
    <div class="card-header"> Upload Poster Image </div>
    <div class="card-body">

        <form action="<?php echo BASE_URL ?>games/imgAct/<?php echo $id; ?>" method="post"
            enctype="multipart/form-data" name="frmMain">
            <input type="hidden" name="game_id" id="game_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="exampleInputFile">กรุณาเลือกรูปภาพที่ต้องการ</label>
                <div class="input-group">
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload">
                        <label class="custom-file-label" for="fileUpload">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <!-- <span class="input-group-text" id="">Upload</span> -->

                        <input type="submit" name="Submit" value="Upload" class="btn btn-primary">
                    </div>
                </div>
            </div>



        </form>
<hr>

<img src="<?php echo BASE_URL?>static/uploads/<?php echo $x_img; ?>"class="img-fluid">


    </div>
    <div class="card-footer">

    </div>
</div>

<br>




<?php $this->loadLayout("role/layout/footer_blank");  ?>