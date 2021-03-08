<?php

class t extends Controller{

    function index(){
        $template = $this->loadView('t_view');
        $template->render();  
    }
 }

?>