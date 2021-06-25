<?php

class webcam_model extends Model{

    function camadd(){
        define('UPLOAD_DIR',   './static/uploads/');
        $img = $_POST['base64image'];
        $imgname = uniqid() . '.png';
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        // $file = UPLOAD_DIR . uniqid() . '.png';
        $file = UPLOAD_DIR . $imgname;
        
        $success = file_put_contents($file, $data, FILE_BINARY);
       //print $success ? $file : 'Unable to save the file.';
$id = $_SESSION['user_id'];
       $sql = " UPDATE tbl_users SET user_img = '$imgname' WHERE user_id = '$id' ";
       // echo "<pre> $sql </pre>";
       $res = $this->execute($sql);
       return $res; 
       


    }
}

?>