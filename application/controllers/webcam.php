<?php 

    class webcam extends Controller{

        function frm(){
            $tp = $this->loadView('webcamFrm_view');
            $tp->render();
        }

        function cap(){
            $dt = $this->loadModel('webcam_model');
            $dt->camadd();


            // $new_image_name_builder =  'slipt_' . uniqid() . "." . pathinfo(basename($_FILES['base64image']['name']), PATHINFO_EXTENSION);
            // $image_upload_path = "./static/uploads/" . $new_image_name_builder;
            // $uploadedFile = $_FILES['base64image']['tmp_name']; 
            // $sourceProperties = getimagesize($uploadedFile);
            // $newFileName = $new_image_name_builder  ; // time();
            // $dirPath = "./static/uploads/";
            // $ext = pathinfo($_FILES['base64image']['name'], PATHINFO_EXTENSION);
            // $imageType = $sourceProperties[2];



            // switch ($imageType) {
            //     case IMAGETYPE_PNG:
            //         $imageSrc = imagecreatefrompng($uploadedFile); 
            //         $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
            //         imagepng($tmp,$dirPath. "t_". $newFileName. ".". $ext);
            //         break;           
    
            //     case IMAGETYPE_JPEG:
            //         $imageSrc = imagecreatefromjpeg($uploadedFile); 
            //         $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
            //         imagejpeg($tmp,$dirPath. "t_". $newFileName. ".". $ext);
            //         break;
                
            //     case IMAGETYPE_GIF:
            //         $imageSrc = imagecreatefromgif($uploadedFile); 
            //         $tmp = $this->imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
            //         imagegif($tmp,$dirPath. "t_". $newFileName. ".". $ext);
            //         break;
    
            //     default:
            //         echo "Invalid Image type.";
            //         exit;
            //         break;
            // }
    
    
            // move_uploaded_file($uploadedFile, $dirPath. $newFileName. ".". $ext);
            // echo "Image Resize Successfully.";






        }

        function imageResize($imageSrc,$imageWidth,$imageHeight) {

            $newImageWidth =200;
            $newImageHeight =200;
        
            $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
            imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
        
            return $newImageLayer;
        }
    }

?>