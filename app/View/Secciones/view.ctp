<!-- File: /app/View/Secciones/view.ctp -->

<h2>Secciones <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $seccion["Seccion"]["idSeccion"]; ?></dd>
  <dt>Descripción</dt>
  <dd><?php echo $seccion["Seccion"]["descripcion"]; ?></dd>
  <dt>Grado</dt>
  <dd><?php echo $seccion["Grado"]["descripcion"]; ?></dd>
  <dt>Nivel</dt>
  <dd><?php echo $seccion["Grado"]["nivel"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Secciones", array("controller" => "Secciones", "action" => "index")); ?>