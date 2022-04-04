<?php
require_once 'init.php';
// Skrypt kontrolera g³ównego jako jedyny "punkt wejœcia" inicjuje aplikacjê.

// Inicjacja ³aduje konfiguracjê, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalaj¹ce odwo³aæ siê z ka¿dego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Ponadto ³aduje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy ju¿ tylko podj¹æ decyzjê co zrobiæ na podstawie $action.

// Dodatkowo zmieniono organizacjê kontrolerów i widoków. Teraz wszystkie s¹ w odpowiednio nazwanych folderach w app

switch ($action) {
	default : // 'calcView'
	    // za³aduj definicjê kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// za³aduj definicjê kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coœ innego ...
		print('hello');
	break;
	case 'action2' :
		// zrób coœ innego ...
		print('goodbye');
	break;
}
