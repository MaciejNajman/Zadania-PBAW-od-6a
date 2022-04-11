<?php
require_once 'init.php';

// Rozszerzenia:
// Dodanie klasy Router oraz Route, kt�re realizuj� idee przedstawione poprzednio, ale na wy�szym poziomie i obiektowo.
// Po pierwsze rezygnujemy ze struktury 'switch' w kontrolerze g��wnym i zast�pujemy j� tablic� �cie�ek przechowywan�
// wewn�trz obiektu routera. Router powstaje w skrypcie init.php i jak inne wa�ne obiekty jest dost�pny przez getRouter().

// Odpowiednio nazwane metody routera realizuj� wszystkie zadania iplementowane uprzednio w funkcji control oraz strukturze 'switch'.

// Oczywi�cie tym samym znika funkcja 'control' - jest ona prywatn� metod� routera.

getRouter()->setDefaultRoute('calcShow'); // akcja/�cie�ka domy�lna
getRouter()->setLoginRoute('login'); // akcja/�cie�ka na potrzeby logowania (przekierowanie, gdy nie ma dost�pu)

getRouter()->addRoute('calcShow',    'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('login',       'LoginCtrl');
getRouter()->addRoute('logout',      'LoginCtrl', ['user','admin']);

getRouter()->go(); //wybiera i uruchamia odpowiedni� �cie�k� na podstawie parametru 'action';