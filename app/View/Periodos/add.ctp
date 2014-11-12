<!-- File: /app/View/Periodos/add.ctp -->
<?php 
    $this->html->addCrumb('Periodos', '/Periodos');
    $this->html->addCrumb('Nuevo', '/Periodos/add');
    
    $this->assign("title", "Periodos - Nuevo");
?>

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
        "label" => "Fecha Final",
        "div" => "formField"
    ));
    echo $this->Html->para(null, "Indique los días que se ralizarán las clases");
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("domingo", array('hiddenField' => false)) . " Domingo"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("lunes", array('hiddenField' => false, "checked" => true)) . " Lunes"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("martes", array('hiddenField' => false, "checked" => true)) . " Martes"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("miercoles", array('hiddenField' => false, "checked" => true)) . " Miércoles"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("jueves", array('hiddenField' => false, "checked" => true)) . " Jueves"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("viernes", array('hiddenField' => false, "checked" => true)) . " Viernes"));
    echo $this->Html->div("formField", $this->Form->label(null, $this->Form->checkbox("sabado", array('hiddenField' => false)) . " Sábado"));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Periodos", array("controller" => "Periodos", "action" => "index"));
?>