<?php
if(!function_exists('_rootpath')){
    function _rootpath(string $filename = null):string
    {
        return $proper_filename = $_SERVER['DOCUMENT_ROOT']."/crud/". trim(str_replace("\\","/",$filename),"/");

    }
}

if(!function_exists('_uc')){
    function _uc(string $str){
        return strtoupper($str);
    }
}

