<?php
namespace Bootstrap\Lib;

abstract class AutoLoadAbstract{
    private $observers = array();

    //添加观察者
    function addObserver(AutoLoadInterface $observer){
        $this->observers[] = $observer;
    }

    //删除观察者
    function delObserver(AutoLoadInterface $observer){
        $index = array_search($observer, $this->observers);
        if ($index === FALSE || ! array_key_exists($index, $this->observers)) {
            return FALSE;
        }
        unset($this->observers[$index]);
        return TRUE;
    }
    //通知观察者执行
    function notify(){
        if (!is_array($this->observers)) {
            return FALSE;
        }
        if(count($this->observers)>0){
            foreach($this->observers as $observer)
            {
                $observer->loading();
            }
        }
    }
}