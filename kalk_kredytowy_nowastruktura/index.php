<?php
require_once dirname(__FILE__).'/init.php';

//przekierowanie przegl�darki klienta (redirect)
//header("Location: ".$conf->root_path."/ctrl.php");

//przekazanie ��dania do nast�pnego dokumentu ("forward")
include $conf->root_path.'/ctrl.php';