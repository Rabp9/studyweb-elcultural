<?php
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(80);
    $fpdf->Cell(30, 30, utf8_decode($titulo), 0 , 0, 'C');
    
    $fpdf->ln();  
    
    $fpdf->SetFont('Arial','B', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    
    // Trimestre I
    $fpdf->Cell(10, 6, utf8_decode("Trimestre I"), 0, 0, 'L', True);
    
    $fpdf->ln(); 
    
    // Para cabecera
    $fpdf->Cell(4, 6, utf8_decode("N°"), 1, 0, 'C', True);
    $fpdf->Cell(40, 6, utf8_decode("Alumno"), 1, 0, 'C', True);
    foreach ($reporteNotas[0]["Notas"] as $nota) {
        if($nota["trimestre"] == "I")
            $fpdf->Cell(24, 6, utf8_decode($nota["descripcion"] . " (" . $nota["peso"]) . ")", 1, 0, 'C', True);
    }
    $fpdf->Cell(24, 6, utf8_decode("Promedio"), 1, 0, 'C', True);
   
    $fpdf->ln();
    
    // Para datos
    $fpdf->SetFont('Arial','', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
   
    $i = 0;
    foreach($reporteNotas as $reporteNota) {
        $fpdf->Cell(4, 6, utf8_decode(($i + 1)), 1, 0, 'L', True);
        $fpdf->Cell(40, 6, utf8_decode($reporteNota["Alumno"]["nombreCompleto"]), 1, 0, 'L', True);
        $suma = 0;
        $factor = 0;
        foreach ($reporteNota["Notas"] as $nota) {
            if($nota["trimestre"] == "I") {
                $suma += $nota["valor"] * $nota["peso"];
                $factor += $nota["peso"];
                $fpdf->Cell(24, 6, utf8_decode($nota["valor"]), 1, 0, 'R', True);
            }
        }
        if($factor) {
            $promedio = $suma/$factor;
            $fpdf->Cell(24, 6, utf8_decode(number_format($promedio, 2)), 1, 0, 'R', True);
        }
        $i++;
        $fpdf->ln();
    }
      
    $fpdf->ln();
    
    // Trimestre II
    $fpdf->Cell(10, 6, utf8_decode("Trimestre II"), 0, 0, 'L', True);
    
    $fpdf->ln(); 
    
    // Para cabecera
    $fpdf->Cell(4, 6, utf8_decode("N°"), 1, 0, 'C', True);
    $fpdf->Cell(40, 6, utf8_decode("Alumno"), 1, 0, 'C', True);
    foreach ($reporteNotas[0]["Notas"] as $nota) {
        if($nota["trimestre"] == "II")
            $fpdf->Cell(24, 6, utf8_decode($nota["descripcion"] . " (" . $nota["peso"]) . ")", 1, 0, 'C', True);
    }
    $fpdf->Cell(24, 6, utf8_decode("Promedio"), 1, 0, 'C', True);
        
    $fpdf->ln();
    
    // Para datos
    $fpdf->SetFont('Arial','', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
   
    $i = 0;
    foreach($reporteNotas as $reporteNota) {
        $fpdf->Cell(4, 6, utf8_decode(($i + 1)), 1, 0, 'L', True);
        $fpdf->Cell(40, 6, utf8_decode($reporteNota["Alumno"]["nombreCompleto"]), 1, 0, 'L', True);
        $suma = 0;
        $factor = 0;
        foreach ($reporteNota["Notas"] as $nota) {
            if($nota["trimestre"] == "II") {
                $suma += $nota["valor"] * $nota["peso"];
                $factor += $nota["peso"];
                $fpdf->Cell(24, 6, utf8_decode($nota["valor"]), 1, 0, 'R', True);
            }
        }
        if($factor) {
            $promedio = $suma/$factor;
            $fpdf->Cell(24, 6, utf8_decode(number_format($promedio, 2)), 1, 0, 'R', True);
        }
        $i++;
        $fpdf->ln();
    }
    
    $fpdf->ln();
    
    // Trimestre III
    $fpdf->Cell(10, 6, utf8_decode("Trimestre III"), 0, 0, 'L', True);
    
    $fpdf->ln(); 
    
    // Para cabecera
    $fpdf->Cell(4, 6, utf8_decode("N°"), 1, 0, 'C', True);
    $fpdf->Cell(40, 6, utf8_decode("Alumno"), 1, 0, 'C', True);
    foreach ($reporteNotas[0]["Notas"] as $nota) {
        if($nota["trimestre"] == "III")
            $fpdf->Cell(24, 6, utf8_decode($nota["descripcion"] . " (" . $nota["peso"]) . ")", 1, 0, 'C', True);
    }
    $fpdf->Cell(24, 6, utf8_decode("Promedio"), 1, 0, 'C', True);
        
    $fpdf->ln();
    
    // Para datos
    $fpdf->SetFont('Arial','', 8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
   
    $i = 0;
    foreach($reporteNotas as $reporteNota) {
        $fpdf->Cell(4, 6, utf8_decode(($i + 1)), 1, 0, 'L', True);
        $fpdf->Cell(40, 6, utf8_decode($reporteNota["Alumno"]["nombreCompleto"]), 1, 0, 'L', True);
        $suma = 0;
        $factor = 0;
        foreach ($reporteNota["Notas"] as $nota) {
            if($nota["trimestre"] == "III") {
                $suma += $nota["valor"] * $nota["peso"];
                $factor += $nota["peso"];
                $fpdf->Cell(24, 6, utf8_decode($nota["valor"]), 1, 0, 'R', True);
            }
        }
        if($factor) {
            $promedio = $suma/$factor;
            $fpdf->Cell(24, 6, utf8_decode(number_format($promedio, 2)), 1, 0, 'R', True);
        }
        $i++;
        $fpdf->ln();
    }
    
    $fpdf->ln();
    $fpdf->Output("Reporte_Notas.pdf", "D");
?>