<?php
    class lines_model extends Model{

          function lnList($id)
        {
            $sql = "SELECT * FROM tbl_lines WHERE game_id = $id";
            $res = $this->query($sql);
            return ($res);
        }

    }

?>