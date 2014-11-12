<!-- File: /app/View/Secciones/add.ctp -->
<?php 
    $this->html->addCrumb('Secciones', '/Secciones');
    $this->html->addCrumb('Nuevo', '/Secciones/add');

    $this->assign("title", "Secciones - Nuevo");
?>

<h2>Secciones <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Seccion");
    echo $this->Html->para("lead", "Ingrese los datos de la Sección:");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input('idGrado', array(
        "label" => "Grado",
        "div" => "formField",
        "options" => $grados
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Secciones", array("controller" => "Secciones", "action" => "index"));
?>