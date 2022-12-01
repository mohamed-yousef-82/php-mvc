<?php
namespace PHPMVC\Controllers;
use PHPMVC\Lib\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\EmployeeModel;
class EmployeeController extends AbstractController
{
  use InputFilter;
  use Helper;
  public function defaultAction(){
      $this->_data['employees'] = EmployeeModel::getAll();
      $this->_view();  
  }
  public function addAction(){
    if (isset($_POST['submit'])){
     $emp = new EmployeeModel();
     $emp->name = $this->filterString($_POST["name"]);
     $emp->age = $this->filterInt($_POST["age"]);
     $emp->salary = $this->filterFloat($_POST["salary"]);
     $emp->address = $this->filterString($_POST["address"]);
     if ($emp->save()){
        $_SESSION['message'] = 'Employee,saved successfuly';
        $this->redirect('/php-mvc/employee/');
     }
     var_dump($emp);
    }
    $this->_view();
}

public function editAction(){
    $id= $this->filterInt($this->_params[0]);
    $emp = EmployeeModel::getByPK($id);
    if ($emp===false){
        $this->redirect('/php-mvc/employee/');
    }
    $this->_data['employee'] = $emp;
    if (isset($_POST['submit'])){
 
     $emp->name = $this->filterString($_POST["name"]);
     $emp->age = $this->filterInt($_POST["age"]);
     $emp->salary = $this->filterFloat($_POST["salary"]);
     $emp->address = $this->filterString($_POST["address"]);
     if ($emp->save()){
        $_SESSION['message'] = 'Employee,saved successfuly';
        $this->redirect('/php-mvc/employee/');
     }
   
    }
    $this->_view();
}

public function deleteAction(){
    $id= $this->filterInt($this->_params[0]);
    $emp = EmployeeModel::getByPK($id);
    var_dump($id);
    if ($emp===false){
        $this->redirect('/php-mvc/employee/');
    }
    if ($emp->delete()){
        $_SESSION['message'] = 'Employee,deleted successfuly';
        $this->redirect('/php-mvc/employee/');
     }

}
}
 ?>
