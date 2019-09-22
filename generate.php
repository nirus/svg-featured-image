<?php
    function feature_image_png($image, $path_to_write){        
        $im = new Imagick();
        $svg = file_get_contents($image);

        $im->readImageBlob($svg);

        /*png settings*/
        $im->setImageFormat("png24");
        $im->resizeImage(1200, 630, imagick::FILTER_LANCZOS, 1);  /*Optional, if you need to resize*/
        $im->writeImage($path_to_write);/*(or .jpg)*/
        $im->clear();
        $im->destroy();
    }
?>
