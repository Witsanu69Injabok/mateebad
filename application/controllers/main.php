<?php

class Main extends Controller {

        function index() {
            // if( $_SESSION['user_id']==''){
            //     $this->redirect('login');
            //   }
            $tm = $this->loadView('web_view');
            $tm->render();
        }

    }

?>