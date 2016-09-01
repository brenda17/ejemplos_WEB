<?php
	//Tamanio de una hoja carta en puntos o px
	//612 pt horizontales
	//792 pt hptizontales
	require_once('./fpdf/fpdf.php');
	require_once('infoMultas.php');

	/**
	* Clase PDF que hereda de FPDF, se define el encabezado y el pie de pagina de las hojas del documento
	*/
	class PDF extends FPDF
	{
		private $tipoReporte;
		private $numPlaca;
		private $numReporte;
		private $usuario;
		private $fechaHora;

		function setInformacion($tipoReporte, $numPlaca, $numReporte, $usuario, $fechaHora)
		{
			$this->tipoReporte = $tipoReporte;
			$this->numPlaca = $numPlaca;
			$this->numReporte = $numReporte;
			$this->usuario = $usuario;
			$this->fechaHora = $fechaHora;
		}

		function Header(){
			$this->Image('.jpg', 450, 20,0,40,'JPG');
			//Se establece la fuente del documento <fuente> <estilo> <tamanio>
			$this->SetFont('Arial','B',18);
			//Se establece el color del texto en rgb <r><g><b>
			$this->SetTextColor(226, 35, 26);
			//Se agrega la leyenda "Reporte de" <x> <y> <cadena>
			$this->Text(50,50,'Resumen de '.$this->tipoReporte);
			//Se agrega la linea horizontal <x1> <y1> <x2> <y2>
			$this->Line(50,70,578,70);
			//Se especifican las coordenadas <x> <y>
			$this->SetXY(45,90);
			//Se estable el color de relleno para los elementos
			$this->SetFillColor(145, 145, 145);
			//Se crea una celda para contener los datos del reporte
			$this->Cell(536,40,'',0,0,'L',true);

			//Se establece la fuente del documento
			$this->SetFont('Arial','',9);
			//Se establece el color del texto en rgb <r><g><b>
			$this->SetTextColor(89, 89, 92);
			//Se especifican las coordenadas <x> <y>
			$this->SetXY(55,105);

			$this->Cell(73,0,utf8_decode('Número de placa:'));
			//Se establece la fuente del documento
			$this->SetFont('Arial','B',9);
			$this->Cell(325,0,utf8_decode($this->numPlaca));

			//Se establece la fuente del documento
			$this->SetFont('Arial','',9);
			$this->Cell(80,0,utf8_decode('Número de reporte: '));
			//Se establece la fuente del documento
			$this->SetFont('Arial','B',9);
			$this->Cell(0,0,utf8_decode($this->numReporte));

			//Se especifican las coordenadas <x> <y>
			$this->SetXY(55,117);
			//Se establece la fuente del documento
			$this->SetFont('Arial','',9);
			$this->Cell(35,0,utf8_decode('Usuario: '));
			//Se establece la fuente del documento
			$this->SetFont('Arial','B',9);
			$this->Cell(0,0,utf8_decode($this->usuario));
			//Se establece la fuente del documento
			$this->SetFont('Arial','',9);
			$this->Cell(0,0,utf8_decode($this->fechaHora)."     ",0,0,'R');
		}

		function Footer(){
			//Se establecen las coordenadas para el footer
			$this->SetXY(0,-62);
			//Se estable el color de relleno para los elementos
			$this->SetFillColor(0,0,0);
			//Se crea una celda para contener el logo en el footer
			$this->Cell(621,62,'',0,0,'L',true);

			$this->Image('favicon.jpg', 525, 740,0,40,'JPG');

			//Se establece la posicion de el enumerado de pagina
		    $this->SetY(-20);
		    //Se establece la fuente para la paginacion
		    $this->SetFont('Arial','I',12);
		    //Se imprime la pagina
		    $this->Cell(0,10,$this->PageNo().'/{nb}',0,0,'C');
		}

		function TablaEncabezado($header)
	    {
	    	//Se estable el color de relleno para los elementos
			$this->SetFillColor(145, 145, 145);
			//Se establece la fuente del documento
			$this->SetFont('Arial','B',12);
			//Se establece el color del texto en rgb <r><g><b>
			$this->SetTextColor(0,0,0);

	    	//Cabecera
    		foreach ($header as $col) {
    			$this->Cell(86,20,$col,0,0,'C',true);
    		}


	   }

	   function TablaRow($dato){
	   		//Se establece la fuente del documento <fuente> <estilo> <tamanio>
			$this->SetFont('Arial','',7);
			//Se establece el color del texto en rgb <r><g><b>
			$this->SetTextColor(147, 149, 152);

			$this->SetY($this->GetY()+20);
			$this->SetX(140);
			$this->Cell(86,20,$dato->getFecha(),'BR',0,'C');
			$this->Cell(86,20,$dato->getHora(),'BR',0,'C');
      		$this->Cell(86,20,$dato->getUbicacion(),'BR',0,'C');
      		$this->Cell(86,20,$dato->getVelocidad(),'B',0,'C');
	   }
	}
 ?>
