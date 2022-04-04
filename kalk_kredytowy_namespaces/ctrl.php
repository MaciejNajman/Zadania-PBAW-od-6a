<?php
require_once 'init.php';
// Skrypt kontrolera g³ównego jako jedyny "punkt wejœcia" inicjuje aplikacjê.

// Inicjacja ³aduje konfiguracjê, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalaj¹ce odwo³aæ siê z ka¿dego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Nowoœci¹ jest sama klasa ClassLoader oraz utworzenie obiektu tej klasy w skrypcie init z dostêpem jak dla
// wczeœniejszych obiektow za pomoc¹ funkcji getLoader(). Pozwala ona automatycznie za³adowaæ klasy umieszczone
// w g³ównym folderze aplikacji - w podfolderach zgodnie z ich przestrzeniami nazw (które s¹ czêœci¹ pe³nej nazwy klasy).

// Ponadto ³aduje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy ju¿ tylko podj¹æ decyzjê co zrobiæ na podstawie $action.

// Dodatkowo zmieniono organizacjê kontrolerów i widoków. Teraz wszystkie s¹ w odpowiednio nazwanych folderach w app

switch ($action) {
	default : // 'calcView'
		// utwórz obiekt i uzyj
		// (autoloader sam za³aduje plik na podstawie przestrzeni nazw wzglêdem folderu g³ównego aplikacji)
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// utwórz obiekt i uzyj
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coœ innego ...
		print('Witam w akcji 1, czy chcesz przejsc do akcji 2?');
	break;
	case 'action2' :
		// zrób coœ innego ...
		print('Akcja 2 zegna sie.');
	break;
}
//app/controllers/CalcCtrl();