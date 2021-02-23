<?php
    class reg extends Controller{
        function index() {
            $template = $this->loadView('register_view');
            $template->render();  
        }
    }

?>