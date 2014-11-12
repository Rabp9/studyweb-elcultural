<!-- File: /app/View/Cursos/add.ctp -->
<?php 
    $this->html->addCrumb('Cursos', '/Cursos');
    $this->html->addCrumb('Nuevo', '/Cursos/add');

    $this->assign("title", "Cursos - Nuevo");
?>

<h2>Cursos <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Curso");
    echo $this->Html->para("lead", "Ingrese los datos del Curso:");
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
    echo $this->Html->link("Regresar a Lista Cursos", array("controller" => "Cursos", "action" => "index"));
?>