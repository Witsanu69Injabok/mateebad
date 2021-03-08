<?php

class users_model extends Model { 

    function search_username ($user_name){
        $sql = "SELECT * FROM tbl_users WHERE user_name = '$user_name' ";
        $res = $this->query($sql);
        return ($res);       
    }

    function update_profile($user_id){

        $update_date =  date("Y-m-d h:i:s");
        $update_user_id = $_SESSION["user_id"];

        $sql = "UPDATE tbl_users SET ";
        $sql .= " user_fullname = '" . @$_POST["user_fullname"] . "', ";
        $sql .= " user_nickname = '". @$_POST["user_nickname"] . "', ";
        $sql .= " idcard = '". @$_POST["idcard"] . "', ";
        $sql .= " user_email = '". @$_POST["user_email"] . "', ";
        $sql .= " user_tel = '". @$_POST["user_tel"] . "', ";
        $sql .= " user_sex = '". @$_POST["user_sex"] . "', ";
     if (@$_POST['user_birth'] != null) {  $sql .= " user_birth = '". @$_POST["user_birth"] . "', "; }
        $sql .= " user_comment = '". @$_POST["user_comment"] . "' , ";
        $sql .= " IsActive = 1 , ";
        $sql .= " update_user_id ='" . $update_user_id . "' , ";
        $sql .= " update_date = '" . $update_date . "' ";
        $sql .= " WHERE user_id = $user_id";
        //  echo "<pre> $sql </pre> ";
        $res = $this->execute($sql);
        return $res;
    }
    function list($levelid){
        if($levelid == "0"){
            $sql = " SELECT * FROM tbl_users WHERE IsActive = 1 AND IsDelete = 0 ";
        } else {
            $sql = " SELECT * FROM tbl_users WHERE IsActive = 1 AND IsDelete = 0 AND level_id = $levelid ";
        }
        $res = $this->query($sql);
        return $res;
    } // end function




}

?>