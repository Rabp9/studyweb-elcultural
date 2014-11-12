<!-- File: /app/View/Alumnos/view.ctp -->
<?php 
    $this->html->addCrumb('Alumnos', '/Alumnos');
    $this->html->addCrumb('Ver', '/Alumnos/Ver');
    
    $this->assign("title", "Alumnos - Ver");
?>

<h2>Alumnos <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $alumno["Alumno"]["idAlumno"]; ?></dd>
  <dt>Nombre Completo</dt>
  <dd><?php echo $alumno["Alumno"]["apellidoPaterno"] . " " . $alumno["Alumno"]["apellidoMaterno"] . ", " . $alumno["Alumno"]["nombres"]; ?></dd>
  <dt>Apoderado</dt>
  <dd><?php echo $alumno["Alumno"]["nombreApoderado"]; ?></dd>  
  <dt>Fecha de Nacimiento</dt>
  <dd><?php echo $alumno["Alumno"]["fechaNac"]; ?></dd>
  <dt>Dirección</dt>
  <dd><?php echo $alumno["Alumno"]["direccion"]; ?></dd>
  <dt>Nombre de Usuario</dt>
  <dd><?php echo $alumno["User"]["username"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Alumnos", array("controller" => "Alumnos", "action" => "index")); ?>
