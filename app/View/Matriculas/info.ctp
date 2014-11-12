<!-- File: /app/View/Matriculas/index.ctp -->
<?php 
    $this->html->addCrumb('Ficha Matricula', '/info');
    
    $this->assign("title", "Matriculas - Ficha Matrìcula");
?>

<h2>Matricula <small>Información de Matrícula</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $alumno["Alumno"]["idAlumno"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Nombre de Apoderado</dt>
    <dd><?php echo $alumno["Alumno"]["nombreApoderado"]; ?></dd>
    <dt>Fecha de Nacimiento</dt>
    <dd><?php echo $alumno["Alumno"]["fechaNac"]; ?></dd>
    <dt>Dirección</dt>
    <dd><?php echo $alumno["Alumno"]["direccion"]; ?></dd>
    <dt>Fecha de Matrícula</dt>
    <dd><?php echo $matricula["Matricula"]["fecha"]; ?></dd>
    <dt>Periodo</dt>
    <dd><?php echo $matricula["Periodo"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $seccion["Grado"]["descripcion_general"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $seccion["Seccion"]["descripcion"]; ?></dd>
</dl>