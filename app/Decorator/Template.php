<?php
namespace App\Decorator;

class Template implements \App\Decorator\DecoratorInterface
{
    
    protected $controller;

    function beforeRequest($controller=null)
    {
        $this->controller = $controller;


    }

    function afterRequest($return_value=null)
    {
        /*if ($_GET['app'] == 'html')
        {
            foreach($return_value as $k => $v)
            {
                $this->controller->assign($k, $v);
            }
            $this->controller->display();
        }*/
    }
}