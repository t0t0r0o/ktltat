<?php 
session_start();
//load model
//connect Database
require "config.php";
require "connectDB.php";
require "functions.php";
//Student
require "model/User.php";
require "model/UserRepository.php";
//Subject
require "model/Subject.php";
require "model/SubjectRepository.php";
//Register
require "model/Register.php";
require "model/RegisterRepository.php";
//Session
require "model/Session.php";
require "model/SessionRepository.php";

//router
$c = $_GET["c"] ?? "student";
$a = $_GET["a"] ?? "list";
$controllerName = ucfirst($c). "Controller";//StudentController
require "controller/" . $controllerName . ".php";
$controller = new $controllerName();//new StudentController();
$controller->$a();//$controller->list();

?>