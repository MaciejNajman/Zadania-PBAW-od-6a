<?php
require_once 'init.php';
// Skrypt kontrolera g��wnego jako jedyny "punkt wej�cia" inicjuje aplikacj�.

// Inicjacja �aduje konfiguracj�, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalaj�ce odwo�a� si� z ka�dego miejsca w systemie do obiekt�w konfiguracji, messages i smarty.

// Nowo�ci� jest sama klasa ClassLoader oraz utworzenie obiektu tej klasy w skrypcie init z dost�pem jak dla
// wcze�niejszych obiektow za pomoc� funkcji getLoader(). Pozwala ona automatycznie za�adowa� klasy umieszczone
// w g��wnym folderze aplikacji - w podfolderach zgodnie z ich przestrzeniami nazw (kt�re s� cz�ci� pe�nej nazwy klasy).

// Ponadto �aduje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy ju� tylko podj�� decyzj� co zrobi� na podstawie $action.

// Dodatkowo zmieniono organizacj� kontroler�w i widok�w. Teraz wszystkie s� w odpowiednio nazwanych folderach w app

switch ($action) {
	default : // 'calcView'
		// utw�rz obiekt i uzyj
		// (autoloader sam za�aduje plik na podstawie przestrzeni nazw wzgl�dem folderu g��wnego aplikacji)
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// utw�rz obiekt i uzyj
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'action1' :
		// zr�b co� innego ...
		print('Witam w akcji 1, czy chcesz przejsc do akcji 2?');
	break;
	case 'action2' :
		// zr�b co� innego ...
		print('Akcja 2 zegna sie.');
	break;
}
//app/controllers/CalcCtrl();