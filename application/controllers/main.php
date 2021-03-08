<?php

class Main extends Controller {

        function index() {
            // if( $_SESSION['user_id']==''){
            //     $this->redirect('login');
            //   }

                $gt = $this->loadModel('games_model');
                $gv = $gt->gameLimit(10);

                $dt = $this->loadModel('event_model');
                $dv = $dt->show_games();

            $tm = $this->loadView('web_view');
            $tm->set("dv",$dv);
            $tm->render();
        }

    }

?>