<?php

class register_model extends Model {

    function add($x_user,$x_pass,$x_level){

        // check last id
        $last_code = "";
        $new_code = "";
        $prefix_code = "";
        $prefix_year = date("y");
        if ($x_level == "1"){
            $prefix_code = "A";
        } else if ($x_level == "2"){
            $prefix_code = "M";
        }else if ($x_level == "3"){ 
            $prefix_code = "S";
        } else {
            $prefix_code = "O";
        }

        $sql = " SELECT user_id FROM tbl_users ORDER BY user_id DESC Limit 0,1 ";
        $chk = $this->query($sql);
        foreach ($chk as $key => $value) {
            $last_code = $value->user_id;
        }
        $tmp_code = intval($last_code) +1 ;
        $tmp_code = str_pad($tmp_code, 5, "0", STR_PAD_LEFT);

        $new_code = $prefix_code . $prefix_year ."-". $tmp_code;


        $create_date =  date("Y-m-d h:i:s");
        $sql = "INSERT INTO tbl_users (user_code, user_name,user_password,level_id,create_date,IsActive,IsDelete) 
        VALUES ('$new_code' , '$x_user','$x_pass','$x_level','$create_date',0,0) ";
        $res = $this->query($sql);
        return ($res);
    }


    function chkDuplicate($x_user){
        $sql = "SELECT COUNT(user_id) as count_data  FROM tbl_users WHERE user_name = '$x_user' " ;
        echo "<pre> $sql </pre> "; ;
        
        $res = $this->query($sql);
        

        foreach ($res as $key => $value) {
          $x_data = $value->count_data;
        }
        echo "<pre> x_data = >  " . $x_data . " </pre> ";
        return ($res);
    }






 } // end class


?>