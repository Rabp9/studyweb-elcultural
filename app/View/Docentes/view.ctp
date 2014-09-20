<!-- File: /app/View/Docentes/view.ctp -->

<h2>Docentes <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $docente["Docente"]["idDocente"]; ?></dd>
  <dt>Nombre Completo</dt>
  <dd><?php echo $docente["Docente"]["apellidoPaterno"] . " " . $docente["Docente"]["apellidoMaterno"] . ", " . $docente["Docente"]["nombres"]; ?></dd>
  <dt>Fecha de Nacimiento</dt>
  <dd><?php echo $docente["Docente"]["fechaNac"]; ?></dd>
  <dt>Dirección</dt>
  <dd><?php echo $docente["Docente"]["direccion"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Docentes", array("controller" => "Docentes", "action" => "index")); ?>
