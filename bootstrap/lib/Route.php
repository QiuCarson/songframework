<?php
namespace Bootstrap\Lib;
class Route implements AutoLoadInterface{
    public $controller;
    public $action;

    public function loading($event_info = null){

        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']<>'/'){
            $path=$_SERVER['REQUEST_URI'];
            $patharr=explode("/", trim($path,"/"));
            if(isset($patharr[0])){
                $this->controller=$patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->action=$patharr[1];
                unset($patharr[1]);
            }else{
                $this->action="index";
            }
            $count=count($patharr);
            $i=2;
            while ( $i< $count) {
                if(isset($patharr[$i+1])){
                    $_GET[$patharr[$i]]=$patharr[$i+1];
                }
                $i=$i+2;
            }

        }else{
            $this->controller="index";
            $this->action="index";
        }

        Register::set('controller',$this->controller);
        Register::set('action',$this->action);

    }
}