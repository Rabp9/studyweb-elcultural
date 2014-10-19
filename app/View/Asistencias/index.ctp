<!-- File: /app/View/Asistencias/index.ctp -->

<h2>Asistencias <small>Verificar</small></h2>
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