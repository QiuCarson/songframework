<?php
namespace Bootstrap\Lib;
class Controller implements \Bootstrap\Lib\AutoLoadInterface{
    public function loading($event_info = null){

        $controller= strtolower(Register::get('controller'));
        $action = ucwords(Register::get('action'));
        $cofnig=new Config(CONFIG_PATH);

        $class = '\\App\\Controllers\\'.$controller;


        $obj = new $class($controller, $action);
        $controller_config =$cofnig['controller'];

        //装饰器模式
        $decorators = array();
        if(!isset($controller_config[$controller]['decorator'])){
            $controller_config[$controller]['decorator'][]='App\Decorator\Template';
        }
        if (isset($controller_config[$controller]['decorator'])){
            $conf_decorator = $controller_config[$controller]['decorator'];
            foreach($conf_decorator as $class)
            {
                $decorators[] = new $class;
            }
        }

        foreach($decorators as $decorator)
        {
            $decorator->beforeRequest($obj);
        }
        $return_value = $obj->$action();

        foreach($decorators as $decorator)
        {
            $decorator->afterRequest($return_value);
        }
    }


}