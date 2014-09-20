<!-- File: /app/View/Docentes/edit.ctp -->

<h2>Docentes <small>Editar</small></h2>

<?php
    echo $this->Form->create("Docente");
    echo $this->Html->para("lead", "Modifique los datos del Docente:");
    echo $this->Form->input("idDocente", array("type" => "hidden"));
    echo $this->Form->input("nombres", array(
        "label" => "Nombres",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("apellidoPaterno", array(
        "label" => "Apellido Paterno",
        "div" => "formField"
    ));
    echo $this->Form->input("apellidoMaterno", array(
        "label" => "Apellido Materno",
        "div" => "formField"
    ));
    echo $this->Form->input("fechaNac", array(
        "label" => "Fecha de Nacimiento",
        "div" => "formField"
    ));
    echo $this->Form->input("direccion", array(
        "label" => "Dirección",
        "div" => "formField",
        "dateFormat" => "Y-m-d"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Docentes", array("controller" => "Docentes", "action" => "index"));
?>