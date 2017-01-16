<?php
namespace App\Decorator;
interface DecoratorInterface{
    public function beforeRequest($controller = null);
    public function afterRequest($return_value = null);
}