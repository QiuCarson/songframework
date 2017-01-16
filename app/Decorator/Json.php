<?php
namespace App\Decorator;

class Json implements \App\Decorator\DecoratorInterface
{

    public function beforeRequest($controller=null)
    {

    }

    public function afterRequest($return_value=null)
    {
        if(isset($return_value)){
            echo json_encode($return_value);
        }
    }
}