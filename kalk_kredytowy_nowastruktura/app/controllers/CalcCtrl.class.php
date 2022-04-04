<?php
// W skrypcie definicji kontrolera nie trzeba do³¹czaæ ¿adnego skryptu inicjalizacji.
// Konfiguracja, Messages i Smarty s¹ dostêpne za pomoc¹ odpowiednich funkcji.
// Kontroler ³aduje tylko to z czego sam korzysta.

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Maciej Najman
 *
 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeñ i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja w³aœciwoœci
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->ile_lat = getFromRequest('ile_lat');
		$this->form->opr = getFromRequest('opr');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeœli brak b³edów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zosta³y przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->ile_lat ) && isset ( $this->form->opr ))) {
			// sytuacja wyst¹pi kiedy np. kontroler zostanie wywo³any bezpoœrednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartoœci zosta³y przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->ile_lat == "") {
			getMessages()->addError('Nie podano czasu splaty kredytu');
		}
		if ($this->form->opr == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		
		// nie ma sensu walidowaæ dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $kwota, $ile_lat i $opr s¹ liczbami
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
	 * Pobranie wartoœci, walidacja, obliczenie i wyœwietlenie
	 */
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametru ile_lat na int
			$this->form->ile_lat = intval ($this->form->ile_lat);
			//zamiana lat na miesi¹ce
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
		//nie trzeba ju¿ tworzyæ Smarty i przekazywaæ mu konfiguracji i messages
		// - wszystko za³atwia funkcja getSmarty()
		
		getSmarty()->assign('page_title','Kalkulator kredytowy 06a');
		getSmarty()->assign('page_description','Kalkulator kredytowy obliczajacy miesieczna rate na podstawie kwoty kredytu, czasu splaty i oprocentowania.');
		getSmarty()->assign('page_header','Kalkulator w PHP');
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); // ju¿ nie podajemy pe³nej œcie¿ki - foldery widoków s¹ zdefiniowane przy ³adowaniu Smarty
	}
}