<?php 
    class gamestatus extends Controller{
        // สถานะการจ่ายเงิน id = gr_id
        function gameTeamPayStatusFrm($id){
            $dt = $this->loadModel('player_model');
            $dv = $dt->TeamDetail($id);
            $tp = $this->loadView('gameTeamPayStatusFrm_view');
            $tp->set('id',$id);
            $tp->set('dv',$dv);
            $tp->render();
        }

        function gameTeamPayStatusAct(){
            $dt = $this->loadModel('player_model');
            $dv = $dt->gameTeamPayStatusAct();
            $template = $this->loadView("closepopup_view");
            $template->render();
        }
        // สถานะการตรรวจสอบ
        function gameTeamApproveFrm($id){

        }

        function gameTeamApproveAct($id){

        }





    }


?>