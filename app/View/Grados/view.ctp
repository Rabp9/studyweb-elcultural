<!-- File: /app/View/Grados/view.ctp -->

<h2>Grados <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $grado["Grado"]["idGrado"]; ?></dd>
  <dt>Descripción</dt>
  <dd><?php echo $grado["Grado"]["descripcion"]; ?></dd>
  <dt>Nivel</dt>
  <dd><?php echo $grado["Grado"]["nivel"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Grados", array("controller" => "Grados", "action" => "index")); ?>