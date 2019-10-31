<?php
spl_autoload_register(function($class){
	include 'classes/lib/'.$class.'.php';
});

 new Employee;
 new Student;
 new Teacher;
 new Researcher;
?>