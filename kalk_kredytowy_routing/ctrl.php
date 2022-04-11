<?php
require_once 'init.php';

// Rozszerzenia:
// Dodanie klasy Router oraz Route, które realizuj¹ idee przedstawione poprzednio, ale na wy¿szym poziomie i obiektowo.
// Po pierwsze rezygnujemy ze struktury 'switch' w kontrolerze g³ównym i zastêpujemy j¹ tablic¹ œcie¿ek przechowywan¹
// wewn¹trz obiektu routera. Router powstaje w skrypcie init.php i jak inne wa¿ne obiekty jest dostêpny przez getRouter().

// Odpowiednio nazwane metody routera realizuj¹ wszystkie zadania iplementowane uprzednio w funkcji control oraz strukturze 'switch'.

// Oczywiœcie tym samym znika funkcja 'control' - jest ona prywatn¹ metod¹ routera.

getRouter()->setDefaultRoute('calcShow'); // akcja/œcie¿ka domyœlna
getRouter()->setLoginRoute('login'); // akcja/œcie¿ka na potrzeby logowania (przekierowanie, gdy nie ma dostêpu)

getRouter()->addRoute('calcShow',    'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('login',       'LoginCtrl');
getRouter()->addRoute('logout',      'LoginCtrl', ['user','admin']);

getRouter()->go(); //wybiera i uruchamia odpowiedni¹ œcie¿kê na podstawie parametru 'action';