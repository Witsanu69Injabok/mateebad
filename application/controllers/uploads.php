<?php
    class uploads extends Controller{

        function sliptFrm ($id){
            $template = $this->loadView('upslipt_view');
            $template->set('id',$id);
            $template->render();
        }

        function sliptAct (){


        }

    }


?>