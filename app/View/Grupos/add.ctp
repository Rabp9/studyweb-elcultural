<!-- File: /app/View/Grupos/add.ctp -->

<h2>Grupos <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Grupo");
    echo $this->Html->para("lead", "Ingrese los datos del Grupo:");
    echo $this->Form->input("descripcion", array(
        "label" => "Nombre de Grupo",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Grupos", array("controller" => "Grupos", "action" => "index"));
?>