<!-- File: /app/View/Alumnos/edit.ctp -->
<?php 
    $this->html->addCrumb('Alumnos', '/Alumnos');
    $this->html->addCrumb('Editar', '/Alumnos/Editar');
    
    $this->assign("title", "Alumnos - Editar");
?>
<h2>Alumnos <small>Editar</small></h2>

<?php
    echo $this->Form->create("Alumno");
    echo $this->Html->para("lead", "Modifique los datos del Alumno:");
    echo $this->Form->input("idAlumno", array("type" => "hidden"));
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
        "div" => "formField",
        "dateFormat" => "Y-m-d"
    ));
    echo $this->Form->input("User.username", array(
        "label" => "Nombre de Usuario",
        "div" => "formField"
    ));
    echo $this->Form->input("User.password", array(
        "label" => "Password",
        "div" => "formField",
        "value" => ""
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Alumnos", array("controller" => "Alumnos", "action" => "index"));
?>