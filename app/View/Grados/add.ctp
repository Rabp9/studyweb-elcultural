<!-- File: /app/View/Grados/add.ctp -->

<h2>Grados <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Grado");
    echo $this->Html->para("lead", "Ingrese los datos del Grado:");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    $niveles = array(
        'Inicial' => 'Inicial', 
        'Primaria' => 'Primaria', 
        'Secundaria' => 'Secundaria', 
        array(
            'name' => '-----------',
            'value' => '-----------',
            'disabled' => TRUE
        ),
        'Extracurricular' => 'Extracurricular'
    );
    echo $this->Form->input('nivel', array(
        'options' => $niveles, 
        'default' => 'Primaria',
        "div" => "formField"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Grados", array("controller" => "Grados", "action" => "index"));
?>