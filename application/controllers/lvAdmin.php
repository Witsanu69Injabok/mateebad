<?php 

class lvAdmin extends Controller {
    function index() {
        $template = $this->loadView('admin_view');
        $template->render();
    }
}

?>