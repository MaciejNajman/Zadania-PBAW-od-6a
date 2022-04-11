<?php
require_once 'init.php';

// Rozszerzenia:
// 1. Konfiguracjê (klasê Config) rozszerzono o dwa nowe pola: 'login_action' oraz 'roles'.
// 'roles' to tablica przechowuj¹ca zapisane w sesji role u¿ytkownika (dowolne nazwy)
// 'login_action' to nazwa akcji, do której system ma automatycznie przekierowaæ, kiedy u¿ytkownik nie ma uprawnieñ (brak podanej roli)

// 2. Rozwi¹zanie wymaga ko¿dorazowego pod³¹czania do sesji (session_start) i ³adowania ról - robi to skrypt init.php, na samym koñcu

// 3. Znacz¹co rozbudowano skrypt functions.php, gdzie dodano pomocnicze funkcje zwi¹zane z :
// - pobieraniem parametrów ze wszystkich mo¿liwych Ÿróde³ (równie¿ sesji i ciasteczek)
//   oraz dodano mo¿liwoœæ wygenerowania komunikatu o b³êdzie w przypadku braku parametru wymaganego
//
// - sprawdzeniem, czy u¿ytkownik jest w danej roli (posiada dany wpis w tablicy ról)
//
// - dodano funkcjê 'control' integruj¹c¹ wywo³anie metody kontrolera ze sprawdzeniem roli,
//   gdy brak wymaganej roli, system automatycznie przekierowuje do akcji zapisanej w polu konfiguracji 'login_action'
//   Znikaj¹ zatem jakiekolwiek skrypty sprawdzaj¹ce, czy ktoœ jest zalogowany (jak 'check.php')

// nale¿y zwróciæ uwagê jak usprawnia to dotychczasow¹ strukturê i logicznie wi¹¿e wywo³anie kontrolera z uprawnieniami
// - nie potrzeba ju¿ 'break' po ka¿dym przypadku, poniewa¿ funkcja 'control' zakoñczona jest poleceniem 'exit'.
// - akcje publiczne nie wymagaj¹ podania roli w funkcji 'control'
// - akcje niepubliczne - wymagaj¹ce posiadania roli - posiadaj¹ tablicê dopuszczonych ról w ostatnim parametrze


getConf()->login_action = 'login'; //okreœlenie akcji logowania - robimy to w tym miejscu, poniewa¿ tu s¹ zdefiniowane wszystkie akcje

switch ($action) {
	default :
		control('app\\controllers', 'CalcCtrl',		'generateView', ['user','admin']);
	case 'login': 
		control('app\\controllers', 'LoginCtrl',	'doLogin');
	case 'calcCompute' : 
		//zamiast pierwszego parametru mo¿na podaæ null lub '' wtedy zostanie przyjêta domyœlna przestrzeñ nazw dla kontrolerów
		control(null, 'CalcCtrl',	'process',		['user','admin']);
	case 'logout' : 
		control(null, 'LoginCtrl',	'doLogout',		['user','admin']);
}