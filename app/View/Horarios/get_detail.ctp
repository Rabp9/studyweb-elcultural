<!-- file path View/Horarios/get_detail.ctp -->

<?php
    echo $this->Form->input("idCurso", array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));  
    echo $this->Form->input("idAula", array(
        "label" => "Aula",
        "div" => "formField",
        "options" => $aulas,
        "empty" => "Selecciona uno"
    ));    
    echo $this->Form->input("idDocente", array(
        "label" => "Docente",
        "div" => "formField",
        "options" => $docentes,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("horas", array(
        "label" => "Horas académicas",
        "div" => "formField",
        "type" => "number",
        "min" => 0,
        "max" => 10,
        "step" => 1,
        "value" => 1
    ));
?>