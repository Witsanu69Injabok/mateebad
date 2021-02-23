<?php

class example extends Controller
{
    function index()
    {
        // $example = $this->loadModel('Example_model');
        // $something = $example->getSomething();

        $template = $this->loadView('t_view');
        // $template->set('someval', $something);
        $template->render();
    }
}

?>