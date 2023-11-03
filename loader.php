<?php
$_dir=__DIR__;
define('env', $_dir);
include(env.'/env.php');


//Helperssssss :)
include 'vendor/autoload.php';
include 'helpers/helpers.php';
include 'helpers/form.php';
include 'helpers/database.php';
include 'helpers/upload.php';
include 'helpers/session.php';