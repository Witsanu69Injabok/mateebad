<?php 

class lvStaff extends Controller {
    function index() {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_name"];

        $dt = $this->loadModel('games_model');
        $dv = $dt->SearchByUserId ($user_id);

        
        $dt = $this->loadModel("users_model");
        $dt_user = $dt->search_username($user_name);

        $template = $this->loadView('staff_view');
        $template->set('dv',$dv);
        $template->set("dt",$dt_user);
        $template->render();
    }
}

?>