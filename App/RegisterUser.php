
<?php

require '../Controller/MessageController.php';

$registerUser = new UserController();

$name = $_POST['name'];
$code = $_POST['code'];

$regiterUser->registerUser($name, $code);


