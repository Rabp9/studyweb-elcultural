<!-- File: /app/View/Users/view.ctp -->
<?php 
    $this->html->addCrumb('Usuarios', '/Users');
    $this->html->addCrumb('Ver', '/Users/view');
?>

<h2>Usuarios <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $user["User"]["idUser"]; ?></dd>
  <dt>Nombre de Usuario</dt>
  <dd><?php echo $user["User"]["username"]; ?></dd>
  <dt>Grupo</dt>
  <dd><?php echo $user["Grupo"]["descripcion"]; ?></dd>
  <dt>Creado</dt>
  <dd><?php echo $user["User"]["created"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Usuarios", array("controller" => "Users", "action" => "index")); ?>