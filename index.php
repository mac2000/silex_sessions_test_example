<?php
require_once 'vendor/autoload.php';

$app = new \Acme\Application(array('debug' => true));
$app->run();