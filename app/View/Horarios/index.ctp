<!-- File: /app/View/Horario/index.ctp -->
<?php 
    $this->html->addCrumb('Horarios', '/Horarios');
?>

<h2>Horarios <small>Registrar</small></h2>

<?php
    echo $this->Form->create();
    echo $this->Form->input('idPeriodo', array(
        "label" => "Periodo",
        "div" => "formField",
        "options" => $periodos
    ));
    echo $this->Form->input('idGrado', array(
        "label" => "Grado",
        "div" => "formField",
        "options" => $grados
    ));    
    echo $this->Form->input('idSeccion');
    echo $this->Form->end();
    
?>