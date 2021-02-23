<?php

class t extends Controller{

    function index(){
        $template = $this->loadView('profile_view');
        $template->render();  
    }
 }

?>