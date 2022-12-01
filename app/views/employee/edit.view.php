<!doctype html>
<html>
<body>
<form method="post">
<fieldset>
<legend>Employee Information</legend>
 <label>Name :</label>
 <input type="text" name="name"  value="<?=$employee->name; ?>" />
 <label>Age :</label>
 <input type="text" name="age"  value="<?=$employee->age; ?>"  />
 <label>Sallary :</label>
 <input type="text" name="salary"  value="<?=$employee->salary; ?>"  />
 <label>Address :</label>
 <input type="text" name="address"  value="<?=$employee->address; ?>"  />
 <input type="submit" name="submit" />
</fieldset>
</form>
</body>
</html>
