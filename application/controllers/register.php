<?php
    class register extends Controller{
        function index() {
            $template = $this->loadView('register_view');
         
            $template->render();
        }
        // function t(){
        //     $template = $this->loadView('t_view');
        //     $template->render();  
        // }
        function frm($msg) {
            $template = $this->loadView('register_view');
            $template->set('msg', $msg);
            $template->render();
        }



        
        function register_add(){
                $x_user_name = $_POST['user_name'];
                $x_user_password1 = $_POST['user_password1'];
                $x_user_password2 = $_POST['user_password2'];
                $x_level_id = $_POST['level_id'];        

                $md = $this->loadModel('register_model');

               $md_chk = $md->chkDuplicate($x_user_name);

                //  echo "<pre>  ";
                //  print_r($md_chk);
                // echo "</pre>";
                $count_data = 0;
                foreach ($md_chk as $key => $value) {
                    $count_data  = $value->count_data;
                }
                //echo "<pre> $count_data </pre> ";
                //echo "<pre> array = >  " . print_r($count_data) . " </pre> ";
                if($count_data == 0){
                                $md_data = $md->add($x_user_name,$x_user_password1,$x_level_id);
                                $template = $this->loadView('web_view');
                                $template->set('rpt_data', $md_data);
                                $this->redirect('login');
                              //  $template->render();   
                } else {

                     $this->redirect('register/frm/'."Duplicate");
                }

                // $this->redirect('admin/index/sendbalance');
              }



    }


?>