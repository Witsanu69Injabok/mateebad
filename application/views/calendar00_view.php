<?php $this->loadLayout("role/layout/header");  ?>

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- fullCalendar -->
<link rel="stylesheet" href="<?php echo BASE_URL ?>static/plugins/fullcalendar/main.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>static/plugins/fullcalendar-daygrid/main.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>static/plugins/fullcalendar-timegrid/main.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>static/plugins/fullcalendar-bootstrap/main.min.css">

<?php
    foreach ($dv as $key => $rs) {
        $json_data[]=array(  
            "id"=>$rs->game_id,
            "fullname"=> "9999999", // $rs->user_fullname,
            "location"=>$rs->game_location,
            "title"=>$rs->game_name,
            "start"=>$rs->game_start ."T09:00:01",
            "end"=>$rs->game_end ."T23:59:59",           
            "color"=>$rs->color,           
             "allDay"=>($rs->allDay==true)?true:false             
                    
                
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );    
    }
    $json= json_encode($json_data);  
    if(isset($_GET['callback']) && $_GET['callback']!=""){  
         echo $_GET['callback']."(".$json.");";      
        }else{  
           echo $json;  
        // $json_string = json_encode($json, JSON_PRETTY_PRINT);
        //  echo "<pre> " . ( $json_string) . "</pre>";
        }  
?>

<div class="row">
    <div class="col-6">
        <h3>ปฎิทินการแข่งขัน</h3>
    </div>
    <div class="col-6 text-right"><a href="" class="btn btn-primary"><i class="fas fa-plus-circle"> </i>
            เพิ่มการแข่ง</a> </div>
</div>
<hr>
<div id='calendar'></div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var initialLocaleCode = 'th';
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        //   initialDate: '2020-09-12',
        events: <?php echo $json; ?>,
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        displayEventTime: false,



        select: function(arg) {

            var title = prompt('Event Title:');
            if (title) {

                calendar.addEvent({
                    id: arg.id,
                    fullname: arg.fullname,
                    location: arg.location,
                    title: arg.title,
                    start: arg.start,
                    end: arg.end,
                    color: arg.color,
                    allDay: arg.allDay
                })
            }

            calendar.unselect()
        },
        // eventClick: function(arg) {
        //     if (confirm('Are you sure you want to delete this event?')) {
        //         arg.event.remove()
        //     }
        // },



        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        timezone: 'Asia/Bangkok',
        //  nextDayThreshold: '00:00:01',
        //  displayEventEnd: true,
        locale: initialLocaleCode,
        weekNumbers: true,

          eventLimit: true,
        header: {
            left: '',
            center: 'prev title next',
            right: ''
        },
        eventClick: function(arg, jsEvent, view) {
            var fname = "123 " + arg.event.fullname;
            alert(fname);
            //alert("->" + arg.event.id + " \n->" + arg.event.fullname + " \n->" + arg.event.location);

            $('#modalID').html(arg.event.id);
            $('#modalTitle').html(arg.event.title);
            $('#modalUserName').html(arg.event.fullname);

            $('#modalBody').html(arg.event.title + "<br> Start : " + arg.event.start.toISOString()
                .slice(0, 10));
            $('#ModalStart').html(arg.event.start.toISOString().slice(0, 10));
            $('#ModalEnd').html(arg.event.end.toISOString().slice(0, 10));
            $('#eventUrl').attr('href', arg.event.id);
          //  $('#fullCalModal').modal();
        }


    });

    calendar.render();
});
</script>





<!-- <div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
               <br> <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"><a id="eventUrl" target="_blank">Event Page</a></button>
            </div>
        </div>
    </div>
</div> -->



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="fullCalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header success">
                <h5 class="modal-title" id="modalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span
                        class="sr-only">close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">ผู้จัด</div>
                    <div class="col-md-8">
                        <div id="eventUrl"></div>

                    </div>

                    <div class="col-md-4">สถานที่แข่ง</div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">เริ่มการแข่งขัน</div>
                    <div class="col-md-8">
                        <div id="ModalStart"></div>
                    </div>

                    <div class="col-md-4">สิ้นสุดการแข่งขัน</div>
                    <div class="col-md-8">
                        <div id="ModalEnd"></div>
                    </div>

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button class="btn btn-primary"><a id="eventUrl" target="_blank">Event Page</a></button>
            </div>
        </div>
    </div>
</div>




<?php $this->loadLayout("role/layout/footer");  ?>
<!-- Theme style -->
<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar/main.js"></script>
<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar-daygrid/main.js"></script>
<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar-bootstrap/main.min.js"></script>


<script src="<?php echo BASE_URL ?>static/plugins/fullcalendar/locales/th.js"></script>