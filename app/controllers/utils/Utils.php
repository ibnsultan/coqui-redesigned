<?php
class Utils{
    
    public static function upload($file='file', $dir=null, $type=null){
        $target_dir = 'storage/uploads/' . $dir;
        $imageFileType = strtolower(pathinfo($_FILES[$file]["name"],PATHINFO_EXTENSION));
        $_FILES["media"]['name'] = round(microtime(true)) . rand(1111, 99999) . '.' . $imageFileType;
        $target_file = $target_dir . basename($_FILES["media"]["name"]); $uploadOk = 1;
        
        // check the submitted file type
        if($type != null):
            if(is_array($type)): if(in_array($imageFileType, $type)): $uploadOk = 1; else: $uploadOk = 0; endif;
                else: if($imageFileType == $type): $uploadOk = 1; else:  $uploadOk = 0;  endif;
            endif;
        endif;
        
        if ($uploadOk == 0) :
            echo "Wrong media format.";
        else :
            if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) :
                return $target_file;
            else :
                echo "Sorry, there was an error uploading your file.";
            endif;
        endif;
    }

    function accessCount(){
        $cookie = $_COOKIE['PHPSESSID'];

        if(file_exists('storage/dump/' . $cookie)):
            $content = file_get_contents('storage/dump/' . $cookie);

            $content = $content + 1;
            file_put_contents('storage/dump/' . $cookie, $content);
        else:
            // if not exist, create the file and write 1 to it
            file_put_contents('storage/dump/' . $cookie, 1);
            $content = 1;
        endif;

        // return the content
        return $content;
    }
}
?>
