<?php
namespace App\Controllers;
class Controller{
    public $smarty;
    public function __construct()
    {
        $this->smarty = new \Smarty;
        $cofnig=new \Bootstrap\Lib\Config(CONFIG_PATH);
        $this->smarty->setTemplateDir(BASEDIR."/".$cofnig['app']['smarty']['setTemplateDir']);
        $this->smarty->setCompileDir(BASEDIR."/".$cofnig['app']['smarty']['setCompileDir']);
        $this->smarty->setConfigDir(BASEDIR."/".$cofnig['app']['smarty']['setConfigDir']);
        $this->smarty->setCacheDir(BASEDIR."/".$cofnig['app']['smarty']['setCacheDir']);
    }
    protected function display($tpl=null){
        if(!isset($tpl)){
            $tpl=strtolower( \Bootstrap\Lib\Register::get('controller'))."/".strtolower( \Bootstrap\Lib\Register::get('action')).".tpl";
        }
        $this->smarty->display($tpl);
    }
    protected function assign($name,$value){
        $this->smarty->assign($name,$value);
    }
}