<?php
require_once 'init.php';
// Skrypt kontrolera g��wnego jako jedyny "punkt wej�cia" inicjuje aplikacj�.

// Inicjacja �aduje konfiguracj�, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalaj�ce odwo�a� si� z ka�dego miejsca w systemie do obiekt�w konfiguracji, messages i smarty.

// Ponadto �aduje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy ju� tylko podj�� decyzj� co zrobi� na podstawie $action.

// Dodatkowo zmieniono organizacj� kontroler�w i widok�w. Teraz wszystkie s� w odpowiednio nazwanych folderach w app

switch ($action) {
	default : // 'calcView'
	    // za�aduj definicj� kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utw�rz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// za�aduj definicj� kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utw�rz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zr�b co� innego ...
		print('hello');
	break;
	case 'action2' :
		// zr�b co� innego ...
		print('goodbye');
	break;
}
