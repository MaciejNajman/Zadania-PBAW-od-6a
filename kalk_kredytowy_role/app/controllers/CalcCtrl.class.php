<?php
// W skrypcie definicji kontrolera nie trzeba do��cza� juz niczego.
// Kontroler wskazuje tylko za pomoc� 'use' te klasy z kt�rych jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np u�ywa obiektu zwracanego przez funkcj�)

// Zarejestrowany autoloader klas za�aduje odpowiedni plik automatycznie w momencie, gdy skrypt b�dzie go chcia� u�y�.
// Je�li nie wska�e si� klasy za pomoc� 'use', to PHP b�dzie zak�ada�, i� klasa znajduje si� w bie��cej
// przestrzeni nazw - tutaj jest to przestrze� 'app\controllers'.

// Przypominam, �e tu r�wnie� s� dost�pne globalne funkcje pomocnicze - o to nam w�a�ciwie chodzi�o

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazuj�c jedynie przestrze� nazw, w kt�rej znajduje si� klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora
 * @author Maciej Najman
 *
 */
class CalcCtrl {

	private $form;   //dane formularza (do oblicze� i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja w�a�ciwo�ci
	 */
	public function __construct(){
		//stworzenie potrzebnych obiekt�w
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametr�w
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->ile_lat = getFromRequest('ile_lat');
		$this->form->opr = getFromRequest('opr');
	}
	
	/** 
	 * Walidacja parametr�w
	 * @return true je�li brak b�ed�w, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zosta�y przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->ile_lat ) && isset ( $this->form->opr ))) {
			// sytuacja wyst�pi kiedy np. kontroler zostanie wywo�any bezpo�rednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne warto�ci zosta�y przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->ile_lat == "") {
			getMessages()->addError('Nie podano czasu splaty kredytu');
		}
		if ($this->form->opr == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		
		// nie ma sensu walidowa� dalej gdy brak parametr�w
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $kwota, $ile_lat i $opr s� liczbami
			if (! is_numeric ( $this->form->kwota )) {
				getMessages()->addError('Kwota nie jest liczba rzeczywista lub calkowita');
			}
			
			if (! is_numeric ( $this->form->ile_lat )) {
				getMessages()->addError('Czas splaty nie jest liczba calkowita');
			}
			
			if (! is_numeric ( $this->form->opr )) {
				getMessages()->addError('Oprocentowanie nie jest liczba rzeczywista lub calkowita');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie warto�ci, walidacja, obliczenie i wy�wietlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametru ile_lat na int
			$this->form->ile_lat = intval ($this->form->ile_lat);
			//zamiana lat na miesi�ce
			$this->form->ile_miesiecy = ($this->form->ile_lat)*12;
			//konwersja parametru ile_miesiecy na int
			$this->form->ile_miesiecy = intval ($this->form->ile_miesiecy);
			
			//konwersja kwoty i oprocentowania na float
			$this->form->kwota = floatval($this->form->kwota);
			$this->form->opr = floatval($this->form->opr);
			
			getMessages()->addInfo('Parametry poprawne.');
		
			//wykonanie operacji
			$this->result->result = ($this->form->kwota + ($this->form->kwota * ($this->form->opr/100))) / ($this->form->ile_miesiecy);
			//zaokraglenie wyniku do 2 miejsc po przecinku (do groszy)
			$this->result->result = round($this->result->result,2);	
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		//nie trzeba ju� tworzy� Smarty i przekazywa� mu konfiguracji i messages
		// - wszystko za�atwia funkcja getSmarty()
		
		getSmarty()->assign('user',unserialize($_SESSION['user']));
		
		getSmarty()->assign('page_title','Kalkulator kredytowy 7a');
		//getSmarty()->assign('page_description','Kalkulator kredytowy obliczajacy miesieczna rate na podstawie kwoty kredytu, czasu splaty i oprocentowania.');
		//getSmarty()->assign('page_header','Kalkulator w PHP');
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl'); // ju� nie podajemy pe�nej �cie�ki - foldery widok�w s� zdefiniowane przy �adowaniu Smarty
	}
}