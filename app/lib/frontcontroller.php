<?php
namespace PHPMVC\LIB;
class FrontController{
  const NOT_FOUND_ACTION = 'notFoundAction';
  const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';
  private $_controller = 'index';
  private $_action = 'default';
  private $_params = array();
  public function __construct()
  {
    $this ->parseUrl();
  }
private function parseUrl(){
  $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),4);
  print_r($url)."<br/>";
  if (isset($url[1]) && $url[1] != ''){
    echo "<br/>";
    echo $this->_controller = $url[1];
    echo "<br/>";
  }
  if (isset($url[2]) && $url[2] != ''){
    echo $this->_action = $url[2];
    echo "<br/>";
  }
  if (isset($url[3]) && $url[3] != ''){
    echo $url[3];
    echo "<br/>";
    print_r($this->_params = explode('/',$url[3]));
    echo "<br/>";
  }
  // list($this->controller,$this->action,$this->params) = explode("/",trim($url,"/"),3);
  // $this->params = explode("/",$this->params);
  // var_dump($this);
}
public function dispatch(){
$controllerClassName = 'PHPMVC\Controllers\\'.ucfirst($this->_controller).'Controller';
$actionName = $this->_action.'Action';
if(!class_exists($controllerClassName)){
  $controllerClassName = self::NOT_FOUND_CONTROLLER;
}
$controller = new $controllerClassName();
if(!method_exists($controller,$actionName)){
  $this->_action =$actionName = self::NOT_FOUND_ACTION;
}
$controller->setController($this->_controller);
$controller->setAction($this->_action);
$controller->setParams($this->_params);
$controller->$actionName();
}
}
 ?>
