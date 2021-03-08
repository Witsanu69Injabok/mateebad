<?php
class th_model extends Model{
        function provinceList(){
        $sql = " SELECT * FROM th_provinces ";
        $rs = $this->query($sql);
        return ($rs);
    }
}



?>