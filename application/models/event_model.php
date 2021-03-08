<?php

class event_model extends Model {
    function show_event() {
        $sql = " SELECT * FROM events ";
        $res = $this->query($sql);
        return ($res);
    }


    function show_games(){
      //  $sql = " SELECT * FROM tbl_games  ";
        $sql = "SELECT	 
        tbl_games.game_id,
        tbl_games.game_code,
        tbl_games.game_name,
        tbl_games.game_owner,
        tbl_games.game_location,
        tbl_games.map_location,
        tbl_games.province_id,
        th_provinces.PROVINCE_NAME,
        tbl_games.game_description,
        tbl_games.game_pay,
        tbl_games.pay_end,
        tbl_games.apply_start,
        tbl_games.apply_end,
        tbl_games.game_start,
        tbl_games.game_end,
        tbl_games.game_money,
        tbl_games.game_remark,
        tbl_games.game_img,
        tbl_games.color,
        tbl_games.allDay,
        tbl_games.pay_status,
        tbl_games.game_status,
        tbl_games.IsActive,
        tbl_games.IsDelete,
        tbl_users.user_name,
        tbl_users.user_fullname 
    FROM
        tbl_games
        LEFT JOIN th_provinces ON th_provinces.PROVINCE_ID = tbl_games.province_id
        LEFT JOIN tbl_users ON tbl_games.game_owner = tbl_users.user_id";
        $res = $this->query($sql);
        return ($res);
    }


}

?>