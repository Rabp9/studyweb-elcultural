<!-- File: /app/View/Asistencias/registrar.ctp -->

<h2>Asistencias <small>Registrar</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos
    ));
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
        $this->Js->alert("sdasd")            
    );
?>