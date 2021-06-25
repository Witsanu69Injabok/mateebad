<?php
    class users extends Controller{


        function UserList($lvid){

            $dt = $this->loadModel('users_model');
            $dv=$dt->List($lvid) ;           

        }

        function UserPopUp($lvid){

            $dt = $this->loadModel('users_model');
            $dv=$dt->List($lvid) ;
            $tp = $this->loadView('popupUser_view');            
            $tp->set('dv',$dv);
            $tp->render();
        }


        function UserAllPopUp($ElementId){

            $dt = $this->loadModel('users_model');
            $dv=$dt->ListAll() ;
            $tp = $this->loadView('popupUser_view');            
            $tp->set('dv',$dv);
            $tp->set('emId',$ElementId);
            $tp->render();
        }





    } // end controller


?>