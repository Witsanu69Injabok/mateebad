<?php
    class th extends Controller{

        function provincelist(){
            $dt = $this->loadModel('th_model');
            $dv = $dt->ProvinceList();

            $tp = $this->loadView('popupProvince_view');
            $tp->set('dv',$dv);
            $tp->render();
        }
    }



?>