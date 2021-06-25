<?php

     class lines extends Controller{


            function gmlist(){

                $GmDt = $this->loadModel('games_model');
                $GmDv = $GmDt->SearchByUserId($_SESSION['user_id']);

                $tp = $this->loadView('gmLine_View');
                $tp->set('GmDv',$GmDv);
                $tp->render();
            }


            public function gmTypeList($id)
            {
                $dt = $this->loadModel('games_model');
                $dv= $dt->gameTypeList($id);

                $lnDt = $this->loadModel('lines_model');
                $lnDv = $lnDt->lnList($id);

                $tp = $this->loadView('LineGmType_View');
                $tp->set('id',$id);
                $tp->set('dv',$dv);
                $tp->set('lnDv',$lnDv);
                $tp->render();

            }    



            function linesList() {

            }


            function lineAddFrm() {

            }

            function lineAddAct(){

            }


            function lineDetail($lineid){

            }

            function lineEditFrm() {

            }


            function lineEditAct(){

            }


     }


?>