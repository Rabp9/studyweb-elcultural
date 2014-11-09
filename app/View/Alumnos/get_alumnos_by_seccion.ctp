<?php
    echo $this->Form->input('idAlumno', array(
        "label" => "Alumno",
        "div" => "formField",
        "options" => $alumnos,
        "empty" => "Selecciona uno"
    ));    
?>