<?php
require_once 'init.php';

// Rozszerzenia:
// 1. Konfiguracj� (klas� Config) rozszerzono o dwa nowe pola: 'login_action' oraz 'roles'.
// 'roles' to tablica przechowuj�ca zapisane w sesji role u�ytkownika (dowolne nazwy)
// 'login_action' to nazwa akcji, do kt�rej system ma automatycznie przekierowa�, kiedy u�ytkownik nie ma uprawnie� (brak podanej roli)

// 2. Rozwi�zanie wymaga ko�dorazowego pod��czania do sesji (session_start) i �adowania r�l - robi to skrypt init.php, na samym ko�cu

// 3. Znacz�co rozbudowano skrypt functions.php, gdzie dodano pomocnicze funkcje zwi�zane z :
// - pobieraniem parametr�w ze wszystkich mo�liwych �r�de� (r�wnie� sesji i ciasteczek)
//   oraz dodano mo�liwo�� wygenerowania komunikatu o b��dzie w przypadku braku parametru wymaganego
//
// - sprawdzeniem, czy u�ytkownik jest w danej roli (posiada dany wpis w tablicy r�l)
//
// - dodano funkcj� 'control' integruj�c� wywo�anie metody kontrolera ze sprawdzeniem roli,
//   gdy brak wymaganej roli, system automatycznie przekierowuje do akcji zapisanej w polu konfiguracji 'login_action'
//   Znikaj� zatem jakiekolwiek skrypty sprawdzaj�ce, czy kto� jest zalogowany (jak 'check.php')

// nale�y zwr�ci� uwag� jak usprawnia to dotychczasow� struktur� i logicznie wi��e wywo�anie kontrolera z uprawnieniami
// - nie potrzeba ju� 'break' po ka�dym przypadku, poniewa� funkcja 'control' zako�czona jest poleceniem 'exit'.
// - akcje publiczne nie wymagaj� podania roli w funkcji 'control'
// - akcje niepubliczne - wymagaj�ce posiadania roli - posiadaj� tablic� dopuszczonych r�l w ostatnim parametrze


getConf()->login_action = 'login'; //okre�lenie akcji logowania - robimy to w tym miejscu, poniewa� tu s� zdefiniowane wszystkie akcje

switch ($action) {
	default :
		control('app\\controllers', 'CalcCtrl',		'generateView', ['user','admin']);
	case 'login': 
		control('app\\controllers', 'LoginCtrl',	'doLogin');
	case 'calcCompute' : 
		//zamiast pierwszego parametru mo�na poda� null lub '' wtedy zostanie przyj�ta domy�lna przestrze� nazw dla kontroler�w
		control(null, 'CalcCtrl',	'process',		['user','admin']);
	case 'logout' : 
		control(null, 'LoginCtrl',	'doLogout',		['user','admin']);
}