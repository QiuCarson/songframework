<?php
namespace Bootstrap\Lib;
class Register{
    protected static $objects;

    //设置别名，放到全局注册树上
    static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }
    //获取对象
    static function get($key)
    {
        if (!isset(self::$objects[$key]))
        {
            return false;
        }
        return self::$objects[$key];
    }
    //删除对象
    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}