<?php

class calendar extends Controller
{
    function index()
    {       
        $dt = $this->loadModel('event_model');
        $dv = $dt->show_games();
        $template = $this->loadView('calendar_view');
        $template->set("dv",$dv);
        $template->render();
    }
}

?>