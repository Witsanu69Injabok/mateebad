<?php $this->loadLayout("role/layout/header_blank");  ?>

<script type="text/javascript" src="<?php echo BASE_URL ?>static/js/webcam.min.js"></script>
<script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {

        document.getElementById('results').innerHTML = '<img id="base64image" src="' + data_uri +
            '"/><br> <button onclick="SaveSnap();"></button>';
        SaveSnap();

    });
}

function ShowCam() {
    Webcam.set({
        width: 420,
        height: 340,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('#my_camera');
}

function SaveSnap() {
    document.getElementById("loading").innerHTML = "Saving, please wait...";
    var file = document.getElementById("base64image").src;
    var formdata = new FormData();
    //document.getElementById('imgname').innerHTML='IMG - > ' + file;
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) {
        uploadcomplete(event);
    }, false);
    ajax.open("POST", "<?php echo BASE_URL ?>webcam/cap");
    ajax.send(formdata);
}

function uploadcomplete(event) {
    document.getElementById("loading").innerHTML = "";
    var image_return = event.target.responseText;
    // document.getElementById('imgname').innerHTML='IMG - > ' + image_return;
    var showup = document.getElementById("uploaded").src = image_return;
}
window.onload = ShowCam;
</script>
<style type="text/css">
.container {
    display: inline-block;
    width: 320px;
}

#Cam {
    background: rgb(255, 255, 215);
}

#Prev {
    background: rgb(255, 255, 155);
}

#Saved {
    background: rgb(255, 255, 55);
}
</style>


<br>

<div class="container-fluid" id="Cam"><b>Webcam Preview...</b>
    <div id="my_camera" style="margin:auto;"></div>
    <form><input type="button" value="บันทึกภาพ" onClick="take_snapshot()"></form>
</div>
<div class="container-fluid" id="Prev">
    <b>Snap Preview...</b>
    <div id="results"></div>
</div>
<div class="container-fluid" id="Saved">
    <b>Saved</b><span id="loading"></span><img id="uploaded" src="" />
</div>

<div id="imgname"></div>