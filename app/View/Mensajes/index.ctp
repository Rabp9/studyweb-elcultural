<!-- File: /app/View/Mensajes/index.ctp -->

<h2>Mensajes <small>Seleccionar Curso</small></h2>

<?php
    echo $this->Form->input("idCurso", array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
?>