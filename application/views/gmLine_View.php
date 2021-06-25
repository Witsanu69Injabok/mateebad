<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<br>
<br>


<div class="container-fluid">


    <div class='card'>
        <div class="card-header">
            <h3>รายการการแข่งขัน</h3>
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> ชื่อรายการแข่งขัน</th>
                        <th> วันที่แข่งขัน </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($GmDv as $key => $value) { ?>

                         <tr>
                            <td><?php echo $value->game_id; ?></td>
                            <td><?php echo $value->game_name; ?></td>
                            <td><?php echo $value->game_start; ?></td>
                           <td> 
                           
                           <a href="<?php echo BASE_URL ?>lines/gmTypeList/<?php echo $value->game_id; ?>" class="btn btn-primary">จัดการสาย</a>
                           
                           </td>
                         </tr>   

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>










<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer");  ?>