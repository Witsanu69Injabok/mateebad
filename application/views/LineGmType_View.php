<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<br>
<br>



<div class='card'>

    <div class="card-header">
        <h3>สายการแข่งขัน</h3>
    </div>
    <div class="card-body">

 

                <?php foreach ($dv as $key => $value) { ?>
               
                    
                    
                 <h3>ประเภทการแข่งขัน : <?php echo $value->gt_hand_name; ?> </h3>   
                    
                   
                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <h5> สาย</h5></div>
                            <div class="col-md-6 text-right"> <a href="" class="btn btn-success btn-sm">เพิ่มสาย </a>  </div>
                            </div>
                         </div>
                        <div class ="card-body">
                        
                        </div>
                    
                    </div>
                    
                    

                <?php } ?>
       


    </div>

</div>












<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer");  ?>