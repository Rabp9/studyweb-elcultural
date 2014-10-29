<!-- file path View/Secciones/get_by_grado.ctp -->

<?php
    echo $this->Form->input('idSeccion', array(
        "label" => "Sección",
        "div" => "formField",
        "options" => $secciones,
        "empty" => "Selecciona uno"
    ));    
?>