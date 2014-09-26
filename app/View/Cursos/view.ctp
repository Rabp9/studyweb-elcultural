<!-- File: /app/View/Cursos/view.ctp -->
<?php 
    $this->html->addCrumb('Cursos', '/Cursos');
    $this->html->addCrumb('Ver', '/Cursos/Ver');
?>

<h2>Cursos <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $curso["Curso"]["idCurso"]; ?></dd>
  <dt>Descripción</dt>
  <dd><?php echo $curso["Curso"]["descripcion"]; ?></dd>
  <dt>Grado</dt>
  <dd><?php echo $curso["Grado"]["descripcion"]; ?></dd>
  <dt>Nivel</dt>
  <dd><?php echo $curso["Grado"]["nivel"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Cursos", array("controller" => "Cursos", "action" => "index")); ?>