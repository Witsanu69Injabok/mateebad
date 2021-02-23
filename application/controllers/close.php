<?php
    class close extends Controller{

        public function popup()
        {
           $template = $this->loadView('closepopup_view');
           $template->render();
        }

    }


?>