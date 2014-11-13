<?php
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(80);
    $fpdf->Cell(30, 30, utf8_decode($titulo), 0 , 0, 'C');
    
    $fpdf->ln();   
    
    $fpdf->SetFont('Arial','', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Docente:"), "LT", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["docente"]), "RT", 0, 'L', True);
 
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Grado y Sección:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["grado_seccion"]), "R", 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Promedio:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["promedio"]), "R", 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("N° Alumnos:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["nro_alumnos"]), "R", 0, 'L', True);
   
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Primeros Puestos:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode("1. " . $estadisticas["primerPuesto"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, "", "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode("2. " . $estadisticas["segundoPuesto"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, "", "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode("3. " . $estadisticas["tercerPuesto"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("N° Aprobados:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["nro_aprobados"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("N° Desaprobados:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["nro_desaprobados"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Nota Mínima:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["notaMinima"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Nota Máxima:"), "L", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["notaMaxima"]), "R", 0, 'L', True);
    
    $fpdf->ln();   
    
    $fpdf->Cell(40, 6, "", 0, 0, 'L', True);
    $fpdf->Cell(44, 6, utf8_decode("Nº de Clases:"), "LB", 0, 'L', True);
    $fpdf->Cell(64, 6, utf8_decode($estadisticas["nro_clases"]), "RB", 0, 'L', True);
    
    $fpdf->Output("Reporte_Estadisticas.pdf", "D");
?>