<?php
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(80);
    $fpdf->Cell(30, 30, utf8_decode($titulo), 0 , 0, 'C');
    
    $fpdf->ln();   
    
    $fpdf->SetFont('Arial','', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    
    $fpdf->Cell(44, 6, utf8_decode("Docente:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["docente"]), 0, 0, 'L', True);
 
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Grado y Sección:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["grado_seccion"]), 0, 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Promedio:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["promedio"]), 0, 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("N° Alumnos:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["nro_alumnos"]), 0, 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Primeros Puestos:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode("1. " . $estadisticas["primerPuesto"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode("2. " . $estadisticas["segundoPuesto"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode("3. " . $estadisticas["tercerPuesto"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("N° Aprobados:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["nro_aprobados"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("N° Desaprobados:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["nro_desaprobados"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Nota Mínima:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["notaMinima"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Nota Máxima:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["notaMaxima"]), 0, 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(44, 6, utf8_decode("Nº de Clases:"), 0, 0, 'L', True);
    $fpdf->Cell(144, 6, utf8_decode($estadisticas["nro_clases"]), 0, 0, 'L', True);
    
    $fpdf->Output("Reporte_Estadisticas.pdf", "D");
?>