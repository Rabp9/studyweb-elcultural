<!-- File: /app/View/Periodos/add.ctp -->

<h2>Periodos <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Periodo");
    echo $this->Html->para("lead", "Ingrese los datos del Periodo:");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("fechaInicio", array(
        "label" => "Fecha de Inicio",
        "div" => "formField"
    ));
    echo $this->Form->input("fechaFin", array(
        "label" => "Fecha de Inicio",
        "div" => "formField"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Periodos", array("controller" => "Periodos", "action" => "index"));
?>