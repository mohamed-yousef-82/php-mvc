<!doctype html>
<html>
<body>
<?php if(isset($_SESSION['message'])){ ?>
 <p class="message <?= isset($error)? 'error':''?>"><?= $_SESSION['message']?></p>
 <?php 
 unset($_SESSION['message']);
 }

 ?>
 <a href="/php-mvc/employee/add">Add Employee</a>

<?php 
if(false !== $employees){
foreach($employees as $employee){
    ?>
<p><b>Name</b><?= $employee->name ?></p>
<p><b>Age</b><?= $employee->age ?></p>
<p><b>Salary</b><?= $employee->salary ?></p>
<p><b>Address</b><?= $employee->address ?></p>

<a href="/php-mvc/employee/edit/<?=$employee->id ?>">edit</a>
<a href="/php-mvc/employee/delete/<?=$employee->id ?>">delete</a>
<?php
}
}else{
    echo "<p>no data</p>";
}
?>
</body>
</html>
