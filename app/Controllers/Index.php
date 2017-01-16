<?php
namespace App\Controllers;
class Index extends Controller{
    public function Index(){
        $this->assign('title','success1');
        $this->display();
    }
}