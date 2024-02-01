<?php
/**
* clase para trabajar con los datos de un alumno
*/
class alumno
{
	// atributos de la clase

	private $centro = 'ZC18P'; // cambiar según el código del centro
	private $tipo = '9';
	private $curso = '2024'; // cambiar según el curso escolar

	public $existe = FALSE;

	public $dni = '';
	public $nom = '';
	public $ap1 = '';
	public $ap2 = '';
	public $fnac = '';
	public $sex = '';
	public $gru = '';
	public $tel = '';
	public $dom = '';
	public $loc = '';
	public $cp = '';

	public $pais = '';
	public $locnac = '';
	public $nac = '';

	public $clase = '0';

	public $cfnNum = '';
	public $cfnExp = '';
	public $cfnCad = '';
	public $cfnHij = '';

	public $email = '';

	public $mod = '';
	public $idi = 'IN';
	public $opt = '';
	public $matMod = '';
	public $esp1 = '';
	public $esp2 = '';
	public $esp3 = '';
	public $esp4 = '';

	/**
	* Constructor de la clase. Verifica si existe el archivo del alumno
	* y en ese caso pone el atributo existe a TRUE y carga los datos
	*/
	function __construct($eldni)
	{
		$this->dni = $eldni;

		if (file_exists('data/'.$eldni.'.txt')) {
			$this->existe = TRUE;
			$this->readFile();
		}
	}

	/**
	* Constructor de la clase. Verifica si existe el archivo del alumno
	* y en ese caso pone el atributo existe a TRUE
	*/

	public function readFile(){

		$fichero = fopen('data/'.$this->dni.'.txt', 'r');
		$datos = fgetcsv($fichero, 500, chr(9));

		// $this->centro = $datos[0];
		// $this->tipo = $datos[1];
		// $this->curso = $datos[2];
		if ($datos[3] != "") {
			$this->dni = $datos[3];
		}
		$this->nom = $datos[4];
		$this->ap1 = $datos[5];
		$this->ap2 = $datos[6];
		$this->fnac = $datos[7];
		$this->sex = $datos[8];
		$this->gru = $datos[9];
		$this->tel = $datos[10];
		$this->dom = $datos[11];
		$this->loc = $datos[12];
		$this->cp = $datos[13];
		$this->pais = $datos[14];
		$this->locnac = $datos[15];
		$this->nac = $datos[16];
		$this->clase = $datos[17];
		$this->cfnNum = $datos[18];
		$this->cfnExp = $datos[19];
		$this->cfnCad = $datos[20];
		$this->cfnHij = $datos[21];
		$this->email = $datos[22];
		$this->mod = $datos[23];
		$this->idi = $datos[24];
		$this->opt = $datos[25];
		$this->matMod = $datos[26];
		$this->esp1 = $datos[27];
		$this->esp2 = $datos[28];
		$this->esp3 = $datos[29];
		$this->esp4 = $datos[30];

		fclose($fichero);
	}

	public function saveFile(){

		$fichero = fopen('data/'.$this->dni.'.txt', 'w');

		$datos = array(	$this->centro,
						$this->tipo,
						$this->curso,
						$this->dni,
						$this->nom,
						$this->ap1,
						$this->ap2,
						$this->fnac,
						$this->sex,
						$this->gru,
						$this->tel,
						$this->dom,
						$this->loc,
						$this->cp,
						$this->pais,
						$this->locnac,
						$this->nac,
						$this->clase,
						$this->cfnNum,
						$this->cfnExp,
						$this->cfnCad,
						$this->cfnHij,
						$this->email,
						$this->mod,
						$this->idi,
						$this->opt,
						$this->matMod,
						$this->esp1,
						$this->esp2,
						$this->esp3,
						$this->esp4);

		$number = count($datos);
		foreach ($datos as $key => $value) {
			if ($key<$number-1){
				fwrite($fichero, $value . chr(9));
			} else {
				fwrite($fichero, $value . chr(10));
			}
		}

		fclose($fichero);
		return TRUE;
	}

	public function importFile($nombreArchivo)
	{
		$fila = 1;
		if (($fichero = fopen($nombreArchivo, 'r')) !== FALSE) {
    		while (($datos = fgetcsv($fichero, 500, ';', '"')) !== FALSE) {

		        $this->dni = $datos[0];
				$this->nom = $datos[1];
				$this->ap1 = $datos[2];
				$this->ap2 = $datos[3];
				$this->fnac = $datos[4];
				$this->sex = $datos[5];
				$this->gru = $datos[6];
				$this->tel = $datos[7];
				$this->dom = $datos[8];
				$this->loc = $datos[9];
				$this->cp = $datos[10];
				$this->pais = $datos[11];
				$this->locnac = $datos[12];
				$this->nac = $datos[13];
				$this->email = $datos[14];
				$this->mod = $datos[15];

				$this->saveFile();
				echo 'Importada fila ' . $fila . ' - alumno: ' . $datos[2] . ' ' . $datos[3] . ', ' . $datos[1] . '<br>';
				$fila = $fila + 1;
        	}
    	}
    	fclose($fichero);
	}
}
?>