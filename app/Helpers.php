<?php

class Helper{

     public static function getthumbs($url){
        $strtoinsert = '/thumbs';
        $oldstr = $url;
        $pos = strrpos($url,"/");

        return substr_replace($oldstr, $strtoinsert, $pos, 0);

    }
}


