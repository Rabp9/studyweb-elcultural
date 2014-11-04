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
    
    $fpdf->Output();
?>