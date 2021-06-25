<?php  $this->loadLayout("role/layout/header");     ?>
<br>
<br>
<?php $this->loadLayout("role/layout/menu_staff");    ?>

<div class="card">
    <div class="card-header">จำนวนผู้เข้าแข่งขันแยกประเภทการแข่งขัน</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ประเภท</th>
                    <th>มือ</th>
                    <th>จำนวนที่รับสมัคร</th>
                    <th>จำนวนผู้สมัคร</th>
                    <th>จำนวนผู้จ่ายเงิน</th>
                    <th>.</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $CountRow = 1;
                    foreach ($dv as $key => $value) {
                       
                    
                ?>
                <tr>
                    <td scope="row"><?php echo $CountRow++; ?></td>
                    <td>
                        <?php
                            if($value->gt_type == 2){
                                echo "ทีม";
                            } else {
                                echo "เดี่ยว";
                            }
                        ?>
                    </td>
                    <td class="text-center"><?php echo $value->gt_hand_name;  ?></td>
                    <td class="text-center"><?php echo $value->gt_total_apply;  ?></td>
                    <td class="text-center"><?php echo $value->total_apply;  ?></td>
                    <td class="text-center"><?php echo $value->total_pay;  ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>player/list2ByGt/<?php echo $value->gt_id; ?>"
                            class="btn btn-info">แสดงรายชื่อ </a>

                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>


    </div>
</div>

<?php  $this->loadLayout("role/layout/footer");     ?>