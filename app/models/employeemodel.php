<?php
namespace PHPMVC\Models;
class EmployeeModel extends AbstractModel
{
 public $id;
 public $name;
 public $age;
 public $salary;
 public $address;
 protected static $tableName = 'employee';
 protected static $primaryKey = 'id';
 protected static $tableSchema = array(
           'name'    => self::DATA_TYPE_STR,
           'age'     => self::DATA_TYPE_INT,
           'salary'  => self::DATA_TYPE_DECIMAL,
           'address' => self::DATA_TYPE_STR

 );

// public function __construct($name,$age,$address,$salary)
// {
// $this->name = $name;
// $this->age = $age;
// $this->address = $address;
// $this->salary = $salary;

// }

}