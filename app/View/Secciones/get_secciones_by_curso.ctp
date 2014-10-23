<!-- file path View/Asistencias/get_secciones_by_curso.ctp -->

<?php
    echo $this->Form->input('idSeccion', array(
        "label" => "Sección",
        "div" => "formField",
        "options" => $secciones,
        "empty" => "Selecciona uno"
    ));
?>