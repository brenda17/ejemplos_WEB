<?php 
	/*
		En este codigo se utiliza la clase FPDF disponible en http://www.fpdf.org/?lang=es
	*/

	require_once 'PDF.php'; //Clase con los metodos para generar el PDF
	require_once 'infoMultas.php'; //Clase con los atributos de una multa

	$pdf = new PDF('P','pt','Letter'); //Se crea un nuevo documento PDF hoja vertical, medida en puntos y tamañp carta
	$pdf->setInformacion('multas', '101UAF', '002536', 'Mario Alberto Victoria Cárdenas', ' 13/04/2015 15:00:00'); //Se envia la informacion del recuadro gris
	$pdf->SetMargins(50,20,30); //Se especifican los margenes derecha,arriba,izquierda
	$pdf->SetAutoPageBreak(true,50); //Se establece que el documento detecte automaticamente el salto de linea y se define un margen inferior
	
	
	//Títulos de las columnas de la tabla
	$header=['Fecha','Hora',utf8_decode('Ubicación'),'Velocidad'];
	
	//Obtencion de la informacion de la base de datos, se guardan en objetos InfoMultas
	$datos = [];
	for ($i=0; $i < 50; $i++) { 
		$infoMultas = new InfoMultas('20/06/2016','15:14','Churubusco',($i+1).' KPH');
		array_push($datos,$infoMultas);
	}

	//Se recorre la informacion de las consultas, escribiendo 20 multas por hoja
	for ($i=0 ; $i< count($datos); $i++) {
		if($i%20 === 0){
			$pdf->AddPage();
			$pdf->SetXY(140,150);
			$pdf->TablaEncabezado($header);
		}
		$pdf->TablaRow($datos[$i]);
	}
	
	//Se agrega la linea horizontal de las observaciones
	$pdf->Line(50,650,578,650);
	//Se establece la fuente del documento 
	$pdf->SetFont('Arial','',9);
	//Se establece el color del texto en rgb <r><g><b>
	$pdf->SetTextColor(0,0,0);
	$pdf->SetY(670);
	//Se coloca la etiqueta de Observaciones
	$pdf->Cell(0,0,'Observaciones');

	//Se agregan las observaciones 
	$pdf->Write(10,utf8_decode('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'));
	
	//Se coloca el numero total de paginas a cada una de las paginas
	$pdf->AliasNbPages();

	//Se muestra el pdf en el navegador
	$pdf->Output();
 ?>
