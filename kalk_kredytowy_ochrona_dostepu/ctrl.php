<?php
require_once 'init.php';

// Brak zmian - init inicjuje system i przygotowuje dok³adnie to co w projekcie 6b.
// Jest zatem nowa struktura, przestrzenie nazw i pomocnicze obiekty i funkcje.

// Poni¿ej wybór akcji pobranej jako parametr z ¿¹dania (zmienna $action inicjowana automatycznie w init.php)

// Zauwa¿my, i¿ w wybranych akcjach zawarto kontrolê dostêpu
// (check.php, jak w projekcie nr 2, przekierowuje na stronê logowania jeœli u¿ytkownik nie jest zalogowany)
// Pozosta³e akcje s¹ publiczne, czyli nie wymagaj¹ logowania, dlatego brak w nich check.php (s¹ to: login oraz action1)

switch ($action) {
	default : // 'calcView' //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		// utwórz obiekt i uzyj
		// (autoloader sam za³aduje plik na podstawie przestrzeni nazw wzglêdem folderu g³ównego aplikacji)
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'login': //akcja PUBLICZNA - brak check.php
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogin();
	break;
	case 'calcCompute' :  //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		// utwórz obiekt i uzyj
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'logout' : //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogout();
	break;
	case 'action1' : // akcja PUBLICZNA - brak check.php
		// zrób coœ innego publicznego ...
		print('Witam w akcji 1 publicznej, co tam?');
	break;
	case 'action2' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		// zrób coœ innego wymagaj¹cego logowania ...
		print('Akcja 2 niepubliczna.');
	break;
}