<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Times','B',18);
	$this->Cell(0,6,'Listado de Usuarios',0,1,'C');
	$this->Ln(10);
	// Ensure table header is printed
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','password','hatoganadero');
$pdf = new PDF();
$pdf->AddPage("L");
// First table: output all columns
$pdf->Table($link,'SELECT usuario.idUsuario, usuario.nombre, usuario.apellido, usuario.correo, usuario.telefono FROM usuarios');
$pdf->Image('logo1.png',10,2,-200);
$pdf->Output();
?>
