<?php
    class games extends Controller{

        function game_list($user_id){
            $dt = $this->loadModel('games_model');
            $dv = $dt->SearchByUserId($user_id);

            $tp = $this->loadView('games_view');
            $tp->set('dv',$dv);
            $tp->render();
        }


        function addFrm() {


        }

        function addAct() {

        }


        function game_detail() {

        }


        function editFrm() {

        }

        function editAct() {

        }



    }

?>