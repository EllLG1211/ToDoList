<?php
require_once "Config/config.php";
global $controls;
require $controls['front'];
$frontController = new FrontController();
