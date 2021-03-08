<?php $this->loadLayout("role/layout/header_blank");  ?>


<div class="card card-primary">
    <div class="card-header"> จังหวัด </div>

    <div class="card-body">

        <table class="table table-hover table-striped" id="dt">
            <thead>
                <tr>
                    <!-- <th> รหัสจังหวัด</th> -->
                    <th> ชื่อจังหวัด</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dv as $key => $value) {
 
 ?>
                <tr
                    onclick="JavaScript:pageOpener('<?php echo $value->PROVINCE_ID; ?>' ,'<?php echo $value->PROVINCE_NAME; ?>') ">
                    <!-- <td><?php echo $value->PROVINCE_ID; ?></td> -->
                    <td><?php echo $value->PROVINCE_NAME; ?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>


    </div>



</div>








<?php $this->loadLayout("role/layout/footer_blank");  ?>

<script language="JavaScript">
function pageOpener(data_id, data_name) {
    //alert(data_id + " " + data_name);
    window.parent.document.getElementById("province_id").value = data_id;
    window.parent.document.getElementById("province_name").value = data_name;
    parent.$.fancybox.close();
}
</script>


<script>
$(document).ready(function() {

    $("#dt").DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        stateSave: true,
        paging: true,
        responsive: true,
        // dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        // buttons: [
        //     'pageLength',
        //     'copyHtml5',
        //     'excelHtml5',
        //     {
        //         extend: 'print',
        //         text: 'Print',
        //         title: '<h5>  ข้อมูลหมวดหมู่ <h6>',
        //     }
        // ]
    });
});
</script>