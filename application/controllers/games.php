<?php
    class games extends Controller{

        function game_list($user_id){
            $dt = $this->loadModel('games_model');
            $dv = $dt->SearchByUserId($user_id);
            $tp = $this->loadView('games_view');
            $tp->set('dv',$dv);
            $tp->render();
        }


        function addFrm() {

            $dt = $this->loadModel('games_model');
            $dv = $dt->gamecode();
            $tp=$this->loadView('gamenew_view');
            $tp->set('gamecode',$dv);
            $tp->render();
        }

        function addAct() {
            $dt = $this->loadModel('games_model');
            $dv = $dt->gamecode();
            $game_code = $dv; 
            $dt->Add($game_code);           
            $tp = $this->loadView('staff_view');
            $tp->redirect('lvStaff');
            $tp->render();
        }

 
        function detail($id,$ptype) {
            $dt = $this->loadModel('games_model');
            $dv = $dt->Detail($id);
            $dvtype= $dt->gameTypeList($id);
            $tp = $this->loadView('GameDetail_view');
            $tp->set('ptype',$ptype);
            $tp->set('dv',$dv);
            $tp->set('dvtype',$dvtype);
            $tp->render();
        }



        function popupdetail($id,$ptype) {
            $dt = $this->loadModel('games_model');
            $dv = $dt->Detail($id);
            $tp = $this->loadView('GamePopUpDetail_view');
            $tp->set('id',$id);
            $tp->set('ptype',$ptype);
            $tp->set('dv',$dv);
            $tp->render();
        }




        function editFrm($id) {
            $dt = $this->loadModel('games_model');
            $dv = $dt->detail($id);

            $tp=$this->loadView('gameedit_view');
            $tp->set('dv',$dv);
            $tp->render();


        }

        function editAct() {
            $id =$_POST["game_id"];
            $dt = $this->loadModel('games_model');
            $dt->Edit();
            $tp=$this->loadView('');
            $tp->redirect('games/detail/'.$id ."/2");
        }


        function imgFrm($id){
            $dt = $this->loadModel('games_model');
            $dv = $dt->detail($id);
            $tp = $this->loadView('GameImg_view');
            $tp->set('id',$id);
            $tp->set('dv',$dv);
            $tp->render();
        }

        function imgAct(){
            $gid = $_POST["game_id"];
            if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {

                $new_image_name_builder =  $gid . '_' . uniqid() . "." . pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);
                $image_upload_path = "./static/uploads/" . $new_image_name_builder;
                $uploadedFile = $_FILES['fileUpload']['tmp_name']; 
                $sourceProperties = getimagesize($uploadedFile);
                $newFileName = $new_image_name_builder  ; // time();
                $dirPath = "./static/uploads/";
                $ext = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
                $imageType = $sourceProperties[2]; 
                switch ($imageType) {
                    case IMAGETYPE_PNG:
                        $imageSrc = imagecreatefrompng($uploadedFile); 
                        $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagepng($tmp,$dirPath. "t_". $newFileName. ".". $ext);
                        break;           
        
                    case IMAGETYPE_JPEG:
                        $imageSrc = imagecreatefromjpeg($uploadedFile); 
                        $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagejpeg($tmp,$dirPath. "t_". $newFileName. ".". $ext);
                        break;
                    
                    case IMAGETYPE_GIF:
                        $imageSrc = imagecreatefromgif($uploadedFile); 
                        $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagegif($tmp,$dirPath. "t_". $newFileName. ".". $ext);
                        break;
        
                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;
                }       
        
                move_uploaded_file($uploadedFile, $dirPath. $newFileName. ".". $ext);
                //echo "Image Resize Successfully.";

                // ------------------------------------
                $dt = $this->loadModel('games_model');
                $dt->update_img($gid,$new_image_name_builder. ".". $ext);
                $template = $this->loadView("closepopup_view");
                $template->render();
            } // end if 

        }

     

        function imageResize($imageSrc,$imageWidth,$imageHeight) {

            $newImageWidth =200;
            $newImageHeight =200;
        
            $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
            imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
        
            return $newImageLayer;
        }


//-----------------------------------------------------------------
//-------------- GameType ---------------------------------------------------

            function gameTypeFrm($id){
                $dt = $this->loadModel('games_model');
                $dv= $dt->gameTypeList($id);
                $tp= $this->loadView('gameTypeFrm_view');
                $tp->set('dv',$dv);
                $tp->set('id',$id);
                $tp->render();
            }

            function gameTypeAct(){
                $id = $_POST["game_id"];
                $dt = $this->loadModel('games_model');
                $dt->addGameType();
               $tp = $this->loadView('');
               $tp->redirect('games/gameTypeFrm/'.$id.'');
            }

            function gameTypeEditFrm($id){
                $dt = $this->loadModel('games_model');
                $dv= $dt->gameTypeDetail($id);
                $tp= $this->loadView('gameTypeEditFrm_view');
                $tp->set('dv',$dv);
                $tp->set('id',$id);
                $tp->render();
            }

            function gameTypeEditAct(){
                //EditGameType
                $id = $_POST["game_id"];
                $dt = $this->loadModel('games_model');
                $dt->EditGameType();
            //    $tp = $this->loadView('');
            //    $tp->redirect('games/gameTypeFrm/'.$id.'');
               $template = $this->loadView("closepopup_view");
               $template->render();
            }





//----------------------------------------------
           function gameUserView($id){
                $dt = $this->loadModel('games_model');
                $dv = $dt->Detail($id);
                $dvtype= $dt->gameTypeList($id);
                $tp = $this->loadView('gameDetailUser_view');
                $tp->set('dv',$dv);
                $tp->set('dvtype',$dvtype);
                $tp->render();
            }
// -----------------------------------------------------------------
            function gameRegis1PlayerFRM($gid,$gtid){ 
                 
                $tp = $this->loadView('gameRegis1Player_view');
                $tp->set('gid',$gid);
                $tp->set('gtid',$gtid);
                $tp->render();
            }


            

            function gameRegis2PlayerFRM($gid,$gtid){ 
                 
                $tp = $this->loadView('gameRegis2Player_view');
                $tp->set('gid',$gid);
                $tp->set('gtid',$gtid);
                $tp->render();
            }
//----------------------------------------------

            function gameStaffFrm($id){                   
                $dt = $this->loadModel('games_model');
                $dv = $dt->gameUserList($id);
                $tp = $this->loadView('gameStaffFrm_view');
                $tp->set('id',$id);
                $tp->set('dv',$dv);
                $tp->render();
            }

            function gameStaffAct(){  
                $id = $_POST["game_id"];
                $dt = $this->loadModel('games_model');
                $dt->gameStaffAdd();

                $tp = $this->loadView('');
                $tp->redirect('games/gameStaffFrm/'.$id);
             }



    }

?>