<?php

define('ROOT', __DIR__);
require_once(ROOT . '/Controller/NewsController.php');

$newsManager = NewsController::getInstance();
$newsManager->index(); 