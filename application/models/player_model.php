<?php
    class player_model extends Model{
        function ListByGt($id){
            $sql = "SELECT
                    tbl_games.game_id,
                    tbl_games_type.gt_id,
                    tbl_games.game_name,
                    tbl_games_type.gt_hand_name,
                    tbl_player2.gr_id,
                    tbl_player2.user_id1,
                    ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.user_id1 ) AS user_name1,
                    ( SELECT user_img FROM tbl_users WHERE tbl_users.user_id = tbl_player2.user_id1 ) AS user_img1,
                    tbl_player2.user_id2,
                    ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.user_id2 ) AS user_name2,
                    ( SELECT user_img FROM tbl_users WHERE tbl_users.user_id = tbl_player2.user_id2 ) AS user_img2,
                    tbl_player2.team_name,
                    tbl_player2.description,
                    tbl_player2.IsApprove,
                    tbl_player2.IsPay,
                    tbl_player2.IsActive,
                    tbl_player2.IsDelete ,
                    tbl_player2.pay_create_user_id,
                    ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.pay_create_user_id ) AS pay_user_name,

                    tbl_player2.pay_create_date,
                    tbl_player2.approve_create_user_id,
                    tbl_player2.approve_create_date,
                    ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.approve_create_user_id ) AS approve_user_name
                        FROM
                            tbl_player2
                            INNER JOIN tbl_games_type ON tbl_player2.gt_id = tbl_games_type.gt_id
                            LEFT JOIN tbl_games ON tbl_player2.game_id = tbl_games.game_id
                        WHERE tbl_games_type.gt_id = $id   ";
                      //  echo "<br> <br> <br> <div > <pre> $sql </pre> </div>";
            $res = $this->query($sql);
            return ($res);
        }
        // ------------------------------------------------------------------


        function TeamDetail($id){
            $sql = "SELECT
                        tbl_games.game_id,
                        tbl_games_type.gt_id,
                        tbl_games.game_name,
                        tbl_games_type.gt_hand_name,
                        tbl_player2.gr_id,
                        tbl_player2.user_id1,
                        ( SELECT user_fullname FROM tbl_users WHERE tbl_users.idcard = tbl_player2.idcard1 ) AS user_name1,
                        ( SELECT user_img FROM tbl_users WHERE tbl_users.idcard = tbl_player2.idcard1 ) AS user_img1,
                        tbl_player2.user_id2,
                        ( SELECT user_fullname FROM tbl_users WHERE tbl_users.idcard = tbl_player2.idcard2 ) AS user_name2,
                        ( SELECT user_img FROM tbl_users WHERE tbl_users.idcard = tbl_player2.idcard2 ) AS user_img2,
                        tbl_player2.team_name,
                        tbl_player2.description,
                        tbl_player2.IsApprove,
                        tbl_player2.IsPay,
                        tbl_player2.pay_date,
                        tbl_player2.IsActive,
                        tbl_player2.IsDelete ,
                        tbl_player2.pay_create_user_id,
                        tbl_player2.pay_create_date,
                        ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.pay_create_user_id ) AS pay_user_name,

                        tbl_player2.approve_create_user_id,
                        tbl_player2.approve_create_date,
                        ( SELECT user_fullname FROM tbl_users WHERE tbl_users.user_id = tbl_player2.approve_create_user_id ) AS approve_user_name

                    FROM
                        tbl_player2
                        INNER JOIN tbl_games_type ON tbl_player2.gt_id = tbl_games_type.gt_id
                        INNER JOIN tbl_games ON tbl_player2.game_id = tbl_games.game_id
                    WHERE tbl_player2.gr_id = $id ";
            echo $sql;
            $res = $this->query($sql);
            return ($res);
        }

        // ------------------------------------------------------------------

        function List2ByGt($id){

            $sql = "SELECT gr_id, gt_id
                            , idcard1 , (SELECT player_name from tbl_players where idcard = idcard1) as name1
                            , idcard2 , (SELECT player_name from tbl_players where idcard = idcard2) as name2
                            , team_name 
                            , IsPay
                            , IsApprove
                            FROM  tbl_player2 WHERE gt_id = $id ";

            $res = $this->query($sql);
            return ($res);  
        }

        // ------------------------------------------------------------------
            function gameTeamPayStatusAct(){
                $IsPay = 0;
                $x_gr_id = $_POST['gr_id'];
                $x_IsPaly = $_POST['IsPay'];
                if($x_IsPaly == 'on'){
                    $IsPay = 1;
                } else {
                    $IsPay = 0;
                }
                $x_pay_date = $_POST['pay_date'];
                // $x_pay_date = $_POST['pay_date'];

                $x_pay_create_date =date("Y-m-d h:i:s");
                $x_pay_create_user_id = $_SESSION["user_id"];
                $xTable="tbl_player2";
            // $xFeild = "";
                $xValue = "IsPay = '$IsPay' , pay_date = '$x_pay_date' , pay_create_user_id = '$x_pay_create_user_id', pay_create_date = '$x_pay_create_date'";
                $xWhere = "gr_id = $x_gr_id";
                $sql = " UPdATE $xTable SET  $xValue  WHERE $xWhere ";
                echo $sql;
                $res = $this->execute($sql);

            }

        // ------------------------------------------------------------------
            function StaffAddPlayer(){
                $game_type_id = $_POST["game_type_id"];
                $team_name = $_POST["team_name"];


                $idcard1 = $_POST["idcard1"];
                $player_name1 = $_POST["player_name1"];
                $player_nickname1 = $_POST["player_nickname1"];
                $player_tel1 = $_POST["player_tel1"];
                $player_birth1 = $_POST["player_birth1"];
                $player_sex1 = $_POST["player_sex1"];

                $idcard2 = $_POST["idcard2"];
                $player_name2 = $_POST["player_name2"];
                $player_nickname2 = $_POST["player_nickname2"];
                $player_tel2 = $_POST["player_tel2"];
                $player_birth2 = $_POST["player_birth2"];
                $player_sex2 = $_POST["player_sex2"];       
                // insert into tbl_player
                //---- 1
                $count_rec = 0;
                $sql = " SELECT count(player_id) as count_rec FROM tbl_players WHERE idcard = '" . $idcard1 . "'  ";
                $res = $this->query($sql);
                foreach ($res as $key => $value) {
                    $count_rec = $value->count_rec  ;
                }
                if ($count_rec == 0){
                    $sql2 = " INSERT INTO tbl_players (idcard,player_name,player_nickname, player_tel, player_birth, player_sex ) " ;
                    $sql2 .= " VALUES ( ";
                    $sql2 .=  "'$idcard1','$player_name1','$player_nickname1','$player_tel1','$player_birth1','$player_sex1'  ";
                    $sql2 .=  " ) ";
                    $this->execute($sql2);
                }
 
                //---- 2
                $count_rec = 0;
                $sql = " SELECT count(player_id) as count_rec FROM tbl_players WHERE idcard = '" . $idcard2 . "'  ";
                $res = $this->query($sql);
                foreach ($res as $key => $value) {
                    $count_rec = $value->count_rec  ;
                }
                if ($count_rec == 0){
                    $sql2 = " INSERT INTO tbl_players (idcard,player_name,player_nickname, player_tel, player_birth, player_sex ) " ;
                    $sql2 .= " VALUES ( ";
                    $sql2 .=  "'$idcard2','$player_name2','$player_nickname2','$player_tel2','$player_birth2','$player_sex2'  ";
                    $sql2 .=  " ) ";
                    $this->execute($sql2);
                }

                // insert into tbl_player2
                $sql = " INSERT INTO tbl_player2 (gt_id,idcard1,idcard2,team_name) ";
                $sql .= " VALUES ( ";
                $sql .=  "'$game_type_id','$idcard1','$idcard2','$team_name'";
                $sql .=  " ) ";
                $this->execute($sql);

                return "complete";
            }

    }
