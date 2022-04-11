<?php
require_once dirname(__FILE__).'/init.php';

//przekierowanie przegladarki klienta (redirect)
//header("Location: ".$conf->root_path."/ctrl.php");

//przekazanie zadania do nastepnego dokumentu ("forward")
include $conf->root_path.'/ctrl.php';