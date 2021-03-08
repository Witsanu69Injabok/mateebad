<?php $this->loadLayout("role/layout/header_blank");  ?>


<div class="card card-primary">
    <div class="card-header"> Upload Slipt Image </div>
    <div class="card-body">

        <form action="<?php echo BASE_URL ?>uploads/sliptAct/<?php echo $id; ?>" method="post"
            enctype="multipart/form-data" name="frmMain">
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

    </div>
    <div class="card-footer">

    </div>
</div>

<br>




<?php $this->loadLayout("role/layout/footer_blank");  ?>