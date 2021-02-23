<?php 

    class imgUpload extends Controller  {

        function uploadfrm($id){

            $template = $this->loadView('imgupload_view');
            $template->set("user_id",$id);
            $template->render();
        }


        function img_add(){
            $pf = $_POST["user_id"];

            if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
                $new_image_name_builder = $pf.'_' . uniqid() . "." . pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);
                $image_upload_path = "./static/uploads/" . $new_image_name_builder;
                copy($_FILES['fileUpload']['tmp_name'], $image_upload_path);
                // move_uploaded_file($_FILES['fileUpload']['tmp_name'], $image_upload_path);
                // copy($_FILES["fileUpload"]["tmp_name"],"$x_path/ImgFull/". $pf. $_FILES["fileUpload"]["name"]);
                $images = $_FILES["fileUpload"]["tmp_name"];
                $new_images =  't_'. $pf. uniqid() . "." . pathinfo(basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION);

                $width=200; //*** Fix Width & Heigh (Autu caculate) ***//
                $size=GetimageSize($images);
                $height=round($width*$size[1]/$size[0]);
                $images_orig = ImageCreateFromJPEG($images);
                $photoX = ImagesX($images_orig);
                $photoY = ImagesY($images_orig);
                $images_fin = ImageCreateTrueColor($width, $height);
                ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                ImageJPEG($images_fin,"./static/uploads/".$new_images);
                ImageDestroy($images_orig);
                ImageDestroy($images_fin);

                $upd = $this->loadModel('upload_model');
                $res = $upd->img( $pf ,$new_image_name_builder );
               
               
            } else {
                $new_image_name_builder = "";
            }
                $template = $this->loadView("closepopup_view");
                $template->render();
        }


    }

?>