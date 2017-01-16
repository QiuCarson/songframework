<?php
namespace Bootstrap;
class App extends \Bootstrap\Lib\AutoLoadAbstract{
    protected static $instance;
    static function getInstance($base_dir){
        if (empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }
    public function run(){

        //观察者模式,添加要加载的项
        //这里做个循环
        $configClassMap=array();

        //路由
        $configClass=new \Bootstrap\Lib\Route;
        self::addObserver($configClass);

        //加载控制器
        $configClass=new \Bootstrap\Lib\Controller;
        self::addObserver($configClass);

        $this->notify();


    }
    static public function initialize($base_dir){
        if (empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }
}