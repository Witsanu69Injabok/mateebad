<?php 

class lvStaff extends Controller {
    function index() {
        $template = $this->loadView('staff_view');
        $template->render();
    }
}

?>