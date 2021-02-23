<?php

class lvUser extends Controller {
    function index() {

        $user_name = $_SESSION["user_name"];
        $dt = $this->loadModel("users_model");
        $dt_user = $dt->search_username($user_name);


        $template = $this->loadView('profile_view');
        $template->set("dt",$dt_user);
        $template->render();
    }


    function profile() {

        $user_name = $_SESSION["user_name"];
        $dt = $this->loadModel("users_model");
        $dt_user = $dt->search_username($user_name);
        $template = $this->loadView('profile_view');
        $template->set("dt",$dt_user);
        $template->render();
    }


    function profile_update() {
        $user_name = $_SESSION["user_name"];

        $dt = $this->loadModel("users_model");

  
        $dt->update_profile(@$_POST['user_id']);

        $dt_user = $dt->search_username($user_name);
        $template = $this->loadView('profile_view');
        $template->set("dt",$dt_user);
        $template->render();

    }




}

?>