<?php 
	/**
	* Descripcion de los atributos de una multa,
	* Contiene un constructor que recibe los valores de los atributos
	* Metodos get para la obtencion de los datos
	*/
	class InfoMultas
	{
		private $fecha;
		private $hora;
		private $ubicacion;
		private $velocidad;

		function __construct($fecha,$hora,$ubicacion,$velocidad)
		{
			$this->fecha = $fecha;
			$this->hora = $hora;
			$this->ubicacion = $ubicacion;
			$this->velocidad = $velocidad;
		}

		public function getFecha(){
			return $this->fecha;
		}

		public function getHora(){
			return $this->hora;
		}

		public function getUbicacion(){
			return $this->ubicacion;
		}

		public function getVelocidad(){
			return $this->velocidad;
		}
	}
 ?>