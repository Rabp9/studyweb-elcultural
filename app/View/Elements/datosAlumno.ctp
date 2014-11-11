<?php
    $alumno = $this->requestAction("/Alumnos/datos");
    if(isset($alumno)) {
?> 
<div class="col-xs-2"><strong>Código:</strong> <?php echo $alumno["Alumno"]["idAlumno"]; ?></div>
<div class="col-xs-4"><strong>Nombre Completo:</strong> <?php echo $alumno["Alumno"]["nombreCompleto"]; ?></div>
<div class="col-xs-3"><strong>Grado y Sección:</strong> <?php echo $alumno["Alumno"]["grado_seccion"]; ?></div>
<?php
    }
    else {
        
?>
<div class="col-xs-12"><strong>No se ha asignado ninguna matrícula aún</strong>
    
</div>
<?php } ?>
