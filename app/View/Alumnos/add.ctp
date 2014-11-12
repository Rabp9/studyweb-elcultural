<!-- File: /app/View/Alumno/add.ctp -->
<?php 
    $this->html->addCrumb('Alumnos', '/Alumnos');
    $this->html->addCrumb('Nuevo', '/Alumnos/Nuevo');
    
    $this->assign("title", "Alumnos - Nuevo");
?>

<h2>Alumnos <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Alumno");
    echo $this->Html->para("lead", "Ingrese los datos del Alumno:");
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
    echo $this->Form->input("nombreApoderado", array(
        "label" => "Apoderado",
        "div" => "formField"
    ));
    echo $this->Form->input("fechaNac", array(
        "label" => "Fecha de Nacimiento",
        "div" => "formField"
    ));
    echo $this->Form->input("direccion", array(
        "label" => "Dirección",
        "div" => "formField"
    ));
    echo $this->Form->input("User.username", array(
        "label" => "Nombre de Usuario",
        "div" => "formField"
    ));
    echo $this->Form->input("User.password", array(
        "label" => "Password",
        "div" => "formField"
    ));
    echo $this->Form->input("User.idGrupo", array(
        "label" => "Password",
        "div" => "formField",
        "type" => "hidden",
        "value" => "2"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Alumnos", array("controller" => "Alumnos", "action" => "index"));
?>