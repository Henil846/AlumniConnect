<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['email'] = 'alumni@example.com';
$_POST['password'] = 'password123';
$_POST['csrf_token'] = 'test';
$_COOKIE['csrf_token'] = 'test';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

require 'app/Core/Env.php';
App\Core\Env::load('.env');
require 'app/Core/Database.php';
require 'app/Models/User.php';
require 'app/Repositories/UserRepository.php';
require 'app/Validators/AuthValidator.php';
require 'app/Services/JwtService.php';
require 'app/Controllers/AuthController.php';

$controller = new App\Controllers\AuthController();
$controller->processLogin();
