<?php
namespace Bootstrap;
class Autoload{
    //要加载的文件都放到classmap的文件里
    public static $classMap=array();
    static function autoload($class){
        //判断文件是否已经加载过了，已经加载过了，就不要在加载了，节约资源
        if(isset($classMap[$class])){
            return true;
        }else{
            $fileClass=BASEDIR."/".str_replace("\\", "/", $class).".php";
            if(is_file($fileClass)){
                include BASEDIR."/".str_replace("\\", "/", $class).".php";
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }



}