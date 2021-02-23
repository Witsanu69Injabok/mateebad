<?php

class event_model extends Model {
    function show_event() {
        $sql = " SELECT * FROM events ";
        $res = $this->query($sql);
        return ($res);
    }


    function show_games(){
        $sql = " SELECT * FROM tbl_games  ";
        $res = $this->query($sql);
        return ($res);
    }


}

?>