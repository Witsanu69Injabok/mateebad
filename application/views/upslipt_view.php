<?php $this->loadLayout("role/layout/header_blank");  ?>


<div class="card card-primary">
    <div class="card-header"> Upload Slipt Image </div>
    <div class="card-body">

        <form action="<?php echo BASE_URL ?>uploads/sliptAct/<?php echo $id; ?>" method="post" enctype="multipart/form-data"
            name="frmMain">
            <input type="hidden" name="game_id" value="<?php echo $id; ?>">
            <div class="row form-group">
                <div class="col-md-8">
                    <label>กรุณาเลือกรูป</label>
                    <input name="fileUpload" type="file" class="form-control-file">
                </div>
                <div class="col-md-3 my-5">
                    <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
                </div>

            </div>


        </form>

    </div>
    <div class="card-footer">
    
    </div>
</div>

<br>




<?php $this->loadLayout("role/layout/footer_blank");  ?>