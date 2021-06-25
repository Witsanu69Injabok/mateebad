<?php 
    class player extends Controller{

        function list2ByGt($id){
            $dt = $this->loadModel('player_model');
            $dv = $dt->List2ByGt($id);

            $gdt = $this->loadModel('games_model');
            $gdv= $gdt->gameApplyDetail($id);

            
            $tp = $this->loadView('gtPlayer2_view');
            $tp->set('gtypeid',$id);
            $tp->set('dv',$dv);
            $tp->set('gdv',$gdv);
            $tp->render();
        }

        function teamDetail($id){
            $dt = $this->loadModel('player_model');
            $dv = $dt->teamDetail($id);
        }



        function StaffAddPlayer($id){

            $template = $this->loadView('StaffAddPlayer_view');  
            $template->set('id',$id);         
            $template->render();
        }

        function StaffAddPlayer_act(){
            $game_type_id = $_POST["game_type_id"];
            $dt = $this->loadModel('player_model'); 
            $dt->StaffAddPlayer();
            $this->redirect('player/list2ByGt/'. $game_type_id);
           //player/list2ByGt/19
        }



    }



?>