<?php 

    class games_model extends Model{

        function list() {

        }


        public function SearchId()
        {
            # code...
        }

        public function SearchByUserId($user_id)
        {
           $sql = "SELECT * FROM tbl_games WHERE create_user_id = $user_id ";
           $rs = $this->query($sql);
           return ($rs);
        }
        public function Add(){

        }

        public function Edit(){
            
        }
        public function Detail(){
            
        }

        public function Approve(){
            
        }




    }


?>