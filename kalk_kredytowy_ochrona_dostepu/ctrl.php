<?php
require_once 'init.php';

// Brak zmian - init inicjuje system i przygotowuje dok�adnie to co w projekcie 6b.
// Jest zatem nowa struktura, przestrzenie nazw i pomocnicze obiekty i funkcje.

// Poni�ej wyb�r akcji pobranej jako parametr z ��dania (zmienna $action inicjowana automatycznie w init.php)

// Zauwa�my, i� w wybranych akcjach zawarto kontrol� dost�pu
// (check.php, jak w projekcie nr 2, przekierowuje na stron� logowania je�li u�ytkownik nie jest zalogowany)
// Pozosta�e akcje s� publiczne, czyli nie wymagaj� logowania, dlatego brak w nich check.php (s� to: login oraz action1)

switch ($action) {
	default : // 'calcView' //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		// utw�rz obiekt i uzyj
		// (autoloader sam za�aduje plik na podstawie przestrzeni nazw wzgl�dem folderu g��wnego aplikacji)
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'login': //akcja PUBLICZNA - brak check.php
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogin();
	break;
	case 'calcCompute' :  //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		// utw�rz obiekt i uzyj
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'logout' : //akcja NIEPUBLICZNA
		include 'check.php'; //KONTROLA
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogout();
	break;
	case 'action1' : // akcja PUBLICZNA - brak check.php
		// zr�b co� innego publicznego ...
		print('Witam w akcji 1 publicznej, co tam?');
	break;
	case 'action2' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		// zr�b co� innego wymagaj�cego logowania ...
		print('Akcja 2 niepubliczna.');
	break;
}