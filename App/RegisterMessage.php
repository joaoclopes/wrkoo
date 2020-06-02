<?php

require '../Controller/UserController.php';

$registerMessage = new MessageController();

$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$subject = $_POST['subject'];
$text = $_POST['text'];

$regiterUser->registerMessage($sender, $receiver, $subject, $text);

