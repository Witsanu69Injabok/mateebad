<?php 

    class games_model extends Model{

        function list() {
            $sql = "SELECT * FROM tbl_games   order by game_id desc ";
            $rs = $this->query($sql);
            return ($rs);
        }

        function gameLimit($lim){
            $sql = "SELECT * FROM tbl_games   order by game_id desc ";
            $rs = $this->query($sql);
            return ($rs);
        }

        public function SearchId()
        {
            # code...
        }

        public function SearchByUserId($user_id)
        {
           $sql = "SELECT * FROM tbl_games WHERE create_user_id = $user_id order by game_id desc ";
           $rs = $this->query($sql);
           return ($rs);
        }
        public function Add($gamecode){
            $create_date =  date("Y-m-d h:i:s");
            $create_user_id = $_SESSION["user_id"];

            $game_code = $gamecode; 
            $game_name = $_POST['game_name']; 
            $game_owner = $_POST['game_owner']; 
            $game_location = @$_POST['game_location']; 
            $map_location = @$_POST['map_location']; 
            $province_id = @$_POST['province_id']; 
            $game_description = @$_POST['game_description']; 
            $game_pay = @$_POST['game_pay']; 
            $pay_end = @$_POST['pay_end']; 
            $apply_start = @$_POST['apply_start']; 
            $apply_end = @$_POST['apply_end']; 
            $game_start = @$_POST['game_start']; 
            $game_end = @$_POST['game_end']; 
            $game_money = @$_POST['game_money']; 
            $game_remark = @$_POST['game_remark'];             
            $pay_status =  0 ; 
            $game_status  =  0; //$_POST['game_status']; 
            $allDay = false; 
            $color = @$_POST['color']; 
            //$color = '#eddcad'; 
            $IsActive = 0; 
            $IsDelete = 0; 

            $pay1player = @$_POST['pay1player']; 
            $pay2player = @$_POST['pay2player'];      
            



            $sql = "INSERT INTO tbl_games 
            (game_code,
                    game_name,
                    game_owner,
                    game_location,
                    map_location,
                    province_id,
                    game_description,
                    game_pay,
                    pay1player,
                    pay2player,
                    pay_end,
                    apply_start,
                    apply_end,
                    game_start,
                    game_end,
                    game_money,
                    game_remark,
                    
                    pay_status,
                    game_status,
                    allDay,
                    color,
                    IsActive,
                    IsDelete,
                    create_user_id,
                    create_date  

                    ) 
            VALUES ( 
                
                '$game_code',
                        '$game_name',
                        '$game_owner',
                        '$game_location',
                        '$map_location',
                        '$province_id',
                        '$game_description',
                        '$game_pay',
                        '$pay1player',
                        '$pay2player',
                        '$pay_end',
                        '$apply_start',
                        '$apply_end',
                        '$game_start',
                        '$game_end',
                        '$game_money',
                        '$game_remark',
                       
                        '$pay_status',
                        '$game_status',
                         '$allDay',
                        '$color',
                        '$IsActive',
                        '$IsDelete',
                        '$create_user_id',
                        '$create_date' 


             ) ";
           echo "<pre> $sql </pre>" ;
           $res = $this->execute($sql);
            return ($res);

        }

        function update_img ($gid,$img){
            $sql = " UPDATE tbl_games SET game_img = '$img' WHERE game_id = '$gid' ";
              echo "<pre> $sql </pre>";
            $res = $this->execute($sql);
            return $res; 
        }


        public function Edit(){
            $update_date =  date("Y-m-d h:i:s");
            $update_user_id = $_SESSION["user_id"];
            $game_id = $_POST["game_id"];
            $game_name = $_POST['game_name']; 
            $game_owner = $_POST['game_owner']; 
            $game_location = @$_POST['game_location']; 
            $map_location = @$_POST['map_location']; 
            $province_id = @$_POST['province_id']; 
            $game_description = @$_POST['game_description']; 
            $game_pay = @$_POST['game_pay']; 
            $pay_end = @$_POST['pay_end']; 
            $apply_start = @$_POST['apply_start']; 
            $apply_end = @$_POST['apply_end']; 
            $game_start = @$_POST['game_start']; 
            $game_end = @$_POST['game_end']; 
            $game_money = @$_POST['game_money']; 
            $game_remark = @$_POST['game_remark'];             
        
            $color = @$_POST['color']; 
            

            $pay1player = @$_POST['pay1player']; 
            $pay2player = @$_POST['pay2player'];   

            $sql = "UPdATE tbl_games SET            
                        game_name =    '$game_name',
                        game_owner =  '$game_owner',
                        game_location =  '$game_location',
                        map_location = '$map_location',
                        province_id = '$province_id',
                        game_description = '$game_description',
                        game_pay = '$game_pay',
                        pay1player = '$pay1player',
                        pay2player =  '$pay2player',
                        pay_end = '$pay_end',
                        apply_start = '$apply_start',
                        apply_end = '$apply_end',
                        game_start = '$game_start',
                        game_end = '$game_end',
                        game_money = '$game_money',
                        game_remark = '$game_remark',
                        color   = '$color',
                        update_user_id = '$update_user_id',
                        update_date = '$update_date'
            WHERE game_id = $game_id
            ";
            
            $res = $this->execute($sql);
            return ($res);
        }
        public function EditAct(){
            
        }

        public function Detail($id){
            $sql = " SELECT	 
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
                    tbl_games.pay1player,
                    tbl_games.pay2player,
                    tbl_games.pay_end,
                    tbl_games.apply_start,
                    tbl_games.apply_end,
                    tbl_games.game_start,
                    tbl_games.game_end,
                    tbl_games.game_money,
                    tbl_games.game_remark,
                    tbl_games.game_img,
                    tbl_games.color,
                    tbl_games.pay_status,
                    tbl_games.game_status,
                    tbl_games.IsActive,
                    tbl_games.IsDelete,
                    tbl_users.user_name,
                    tbl_users.user_fullname 
                FROM
                    tbl_games
                    LEFT JOIN th_provinces ON th_provinces.PROVINCE_ID = tbl_games.province_id
                    INNER JOIN tbl_users ON tbl_games.create_user_id = tbl_users.user_id
            WHERE game_id = $id";
            //echo "<pre> $sql </pre>";
            $res = $this->query($sql);
            return $res; 
        }

        public function Approve(){
            
        }

        function gamecode(){
                $last_code = "";
                $new_code = "";
                $prefix_code = "";
                $prefix_year = date("y");

                $sql = " SELECT game_id FROM tbl_games ORDER BY game_id DESC Limit 0,1 ";
                $chk = $this->query($sql);
                foreach ($chk as $key => $value) {
                    $last_code = $value->game_id;
                }
                $tmp_code = intval($last_code) +1 ;
                $tmp_code = str_pad($tmp_code, 5, "0", STR_PAD_LEFT);
                $new_code = $prefix_code . $prefix_year ."-". $tmp_code;

                return ($new_code);
        }

        

        function addGameType(){
            $game_id = @$_POST['game_id']; 
            $gt_type = @$_POST['gt_type']; 
            $gt_hand_name = @$_POST['gt_hand_name']; 
            $gt_pay = @$_POST['gt_pay']; 
            $gt_total_apply = @$_POST['gt_total_apply']; 
            $gt_description = @$_POST['gt_description']; 
            $rank1 = @$_POST['rank1']; 
            $rank2 = @$_POST['rank2']; 
            $rank3 = @$_POST['rank3']; 
            $rank4 = @$_POST['rank4']; 
            $rank5 = @$_POST['rank5']; 
            $rank_description = @$_POST['rank_description']; 
            $IsActive = 1; 
            $IsDelete = 0; 
            $create_date =  date("Y-m-d h:i:s");
            $create_user_id = $_SESSION["user_id"];

            $sql = " INSERT INTO tbl_games_type (game_id,
                                                gt_type,
                                                gt_hand_name,
                                                gt_pay,
                                                gt_total_apply,
                                                gt_description,
                                                rank1,
                                                rank2,
                                                rank3,
                                                rank4,
                                                rank5,
                                                rank_description,
                                                IsActive,
                                                IsDelete,
                                                create_user_id,
                                                create_date
                                      )  VALUES ('$game_id',
                                                '$gt_type',
                                                '$gt_hand_name',
                                                '$gt_pay',
                                                '$gt_total_apply',
                                                '$gt_description',
                                                '$rank1',
                                                '$rank2',
                                                '$rank3',
                                                '$rank4',
                                                '$rank5',
                                                '$rank_description',
                                                '$IsActive',
                                                '$IsDelete',
                                                '$create_user_id',
                                                '$create_date'
                                      )";
                                     // echo $sql;
                      $res = $this->execute($sql);
                      return ($res);
          
        }

        function EditGameType(){
            $game_id = @$_POST['game_id']; 
            $gt_type = @$_POST['gt_type']; 
            $gt_hand_name = @$_POST['gt_hand_name']; 
            $gt_pay = @$_POST['gt_pay']; 
            $gt_total_apply = @$_POST['gt_total_apply']; 
            $gt_description = @$_POST['gt_description']; 
            $rank1 = @$_POST['rank1']; 
            $rank2 = @$_POST['rank2']; 
            $rank3 = @$_POST['rank3']; 
            $rank4 = @$_POST['rank4']; 
            $rank5 = @$_POST['rank5']; 
            $rank_description = @$_POST['rank_description']; 
            $IsActive = 1; 
            $IsDelete = 0; 
            $update_date =  date("Y-m-d h:i:s");
            $update_user_id = $_SESSION["user_id"];

            $sql = " UPDATE    tbl_games_type SET 
                                            
                                             gt_type='$gt_type',
                                             gt_hand_name= '$gt_hand_name',
                                             gt_pay= '$gt_pay',
                                             gt_total_apply=  '$gt_total_apply',
                                             gt_description= '$gt_description',
                                             rank1=  '$rank1',
                                             rank2= '$rank2',
                                             rank3=  '$rank3',
                                             rank4=  '$rank4',
                                             rank5=  '$rank5',
                                             rank_description=   '$rank_description',                                       
                                             update_user_id=  '$update_user_id',
                                             update_date=  '$update_date'
                    WHERE gt_id = $game_id  ";
                echo $sql;
                      $res = $this->execute($sql);
                      return ($res);
          
        }
        function gameTypeList($id){
            $sql = " SELECT * FROM tbl_games_type where game_id = $id ";
           // echo $sql;
            $res = $this->query($sql);
            return ($res);
        }

        function gameTypeDetail($id){
            $sql = " SELECT * FROM tbl_games_type where gt_id = $id ";
           // echo $sql;
            $res = $this->query($sql);
            return ($res);
        }







        function gameUserList($id){
            $sql = " SELECT tbl_games_user.user_id, user_fullname,owner_description,IsApprove
                     FROM tbl_games_user 
                            INNER JOIN tbl_users ON tbl_users.user_id = tbl_games_user.user_id 
                            where game_id = $id AND tbl_games_user.IsDelete = 0 ";
           // echo $sql;
            $res = $this->query($sql);
            return ($res);
        }

        function gameStaffAdd(){
            $game_id = $_POST["game_id"];
            $user_id = $_POST["user_id"];
            $owner_description = $_POST["owner_description"];
            $IsApprove = $_POST["IsApprove"];
            $IsActive = 1; 
            $IsDelete = 0; 
            $create_date =  date("Y-m-d h:i:s");
            $create_user_id = $_SESSION["user_id"];

            $sql = " INSERT INTO tbl_games_user
             (game_id,user_id,owner_description,IsApprove, IsActive,
                                                IsDelete,
                                                create_user_id,
                                                create_date) 
            VALUES ('$game_id','$user_id','$owner_description',
                                                '$IsApprove', '$IsActive',
                                                '$IsDelete',
                                                '$create_user_id',
                                                '$create_date') ";
            // echo $sql;
              $res = $this->execute($sql);
              return ($res);

        }

/////////////////////////////////////////////////////////////////////////
/// game register by player



        function player1Regis(){
            $game_id = $_POST["game_id"];
            $gt_id = $_POST["gt_id"];
            $user_id = $_POST["user_id"];
            $create_date =  date("Y-m-d h:i:s");
            $create_user_id = $_SESSION["user_id"];
            $xTable="tbl_player1";
            $xField = "game_id,gt_id,player,user_id,create_user_id,create_date";
            $xValue = "'$game_id','$gt_id','1','$user_id','$create_user_id','$create_date'";
            $sql = " INSERT INTO $xTable ($xField) VALUES ($xValue) ";
            $res = $this->execute($sql);
            return ($res);
        }

        function player2Regis(){
            $team_code = $this->genTeamCode();
            $team_name = $_POST["team_name"];
            $game_id = $_POST["game_id"];
            $gt_id = $_POST["gt_id"];
            $user_id1 = $_POST["user_id"];
            $user_id2 = $_POST["user_id1"];
            $create_date =  date("Y-m-d h:i:s");
            $create_user_id = $_SESSION["user_id"];

            $xTable="tbl_player2";
            $xField = "game_id,gt_id, team_code ,  team_name, player,user_id1,user_id2,create_user_id,create_date";

            $xValue = "'$game_id','$gt_id','$team_code' ,'$team_name','2','$user_id1' ,'$user_id2','$create_user_id','$create_date'";
            $sql = " INSERT INTO $xTable ($xField) VALUES ($xValue) ";          
            $res = $this->execute($sql);

            

            return ($res);
        }


        function genTeamCode(){
            $last_code = "";
            $new_code = "";
            $prefix_code = "";
            $prefix_year = date("y");

            $sql = " SELECT team_code FROM tbl_player2 ORDER BY gr_id DESC Limit 0,1 ";
            $chk = $this->query($sql);
            foreach ($chk as $key => $value) {
                $last_code = $value->team_code;
            }
            $tmp_code = intval($last_code) +1 ;
            $tmp_code = str_pad($tmp_code, 5, "0", STR_PAD_LEFT);
            $new_code = $prefix_code . $prefix_year ."-". $tmp_code;

            return ($new_code);
        }

        function gameApplyList($id){
            $sql = "SELECT
                    tbl_games_type.gt_id,
                    tbl_games_type.game_id,
                    tbl_games.game_name,
                    tbl_games_type.gt_type,
                    tbl_games_type.gt_hand_name,
                    tbl_games_type.gt_pay,
                    tbl_games_type.gt_total_apply,
                    tbl_games_type.gt_description,
                    ( SELECT count( gr_id ) FROM tbl_player2 WHERE gt_id = tbl_games_type.gt_id ) AS total_apply,
                    ( SELECT count( gr_id ) FROM tbl_player2 WHERE gt_id = tbl_games_type.gt_id AND IsPay = 1 ) AS total_pay,
                    tbl_games_type.IsActive,
                    tbl_games_type.IsDelete 
                    FROM
                        tbl_games_type
                        INNER JOIN tbl_games ON tbl_games_type.game_id = tbl_games.game_id 
                    WHERE
                    tbl_games_type.game_id = $id;";
            $res = $this->query($sql);
            return ($res);
        }

        function gameApplyDetail($id){
            $sql = "SELECT
                    tbl_games_type.gt_id,
                    tbl_games_type.game_id,
                    tbl_games.game_name,
                    tbl_games_type.gt_type,
                    tbl_games_type.gt_hand_name,
                    tbl_games_type.gt_pay,
                    tbl_games_type.gt_total_apply,
                    tbl_games_type.gt_description,
                    ( SELECT count( gr_id ) FROM tbl_player2 WHERE gt_id = tbl_games_type.gt_id ) AS total_apply,
                    ( SELECT count( gr_id ) FROM tbl_player2 WHERE gt_id = tbl_games_type.gt_id AND IsPay = 1 ) AS total_pay,
                    tbl_games_type.IsActive,
                    tbl_games_type.IsDelete 
                    FROM
                        tbl_games_type
                        INNER JOIN tbl_games ON tbl_games_type.game_id = tbl_games.game_id 
                    WHERE
                    tbl_games_type.gt_id = $id;";
            $res = $this->query($sql);
            return ($res);
        }




    }


?>