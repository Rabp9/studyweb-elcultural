<?php
    $alumno = $this->requestAction("/Alumnos/datos");
?> 
<div class="col-xs-2"><strong>Código:</strong> <?php echo $alumno["Alumno"]["idAlumno"]; ?></div>
<div class="col-xs-4"><strong>Nombre Completo:</strong> <?php echo $alumno["Alumno"]["nombreCompleto"]; ?></div>
<div class="col-xs-3"><strong>Grado y Sección:</strong> <?php echo $alumno["Alumno"]["grado_seccion"]; ?></div>
