<?php
require('../librerias/fpdf/fpdf.php');
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

function agregarTexto($pdf, $texto, $x, $y, $aling='L', $fuente, $size=10, $r=0, $g=0, $b=0){
    $pdf->SetFont($fuente, '', $size);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r,$g,$b);
    $pdf->Cell(0, 10, $texto, 0, 0, $aling);
    //$pdf->Text($x, $y, $texto);
}
function agregarImagen($pdf, $imagen, $x, $y){
    $pdf->Image($imagen, $x, $y, 0);
}
$idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
$idalumno=isset($_GET['idalumno'])?$_GET['idalumno']:'';

$sql="SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso FROM alumnos, cursos WHERE alumnos.id=:idalumno AND cursos.id=:idcurso";
$consulta=$conexionBD->prepare($sql);
$consulta->bindParam(':idalumno',$idalumno);
$consulta->bindParam(':idcurso',$idcurso);
$consulta->execute();
$alumno=$consulta->fetch(PDO::FETCH_ASSOC);

$pdf = new FPDF("L", "mm", array(450,260));
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
agregarImagen($pdf,"../src/certificado.jpg",0,0);
agregarTexto($pdf,ucwords(utf8_decode($alumno['nombre'].' '.$alumno['apellidos'])),150,170,'L','Helvetica',30,0,84,115);
agregarTexto($pdf,$alumno['nombre_curso'],0,210,'C','Helvetica',30,0,84,115);
agregarTexto($pdf,date("d/m/Y"),0,8,'C','Helvetica',30,0,84,115);
$pdf->Output();


?>