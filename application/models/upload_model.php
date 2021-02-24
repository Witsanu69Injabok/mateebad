<?php

class upload_model extends Model {

    function img($id,$fname){
        $sql = " UPDATE tbl_users SET user_img = '$fname' WHERE user_id = '$id' ";
        // echo "<pre> $sql </pre>";
        $res = $this->execute($sql);
        return $res; 
    }




    
}


?>
 