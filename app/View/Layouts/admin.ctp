<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $this->fetch("title"); ?></title>

        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
            echo $this->Html->css('studyweb');
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row banner">
                <div class="col-xs-2"></div>
                <div class="col-xs-1">
                    <?php echo $this->Html->link(
                            $this->Html->image('elcultural.logo.png', array('alt' => "El Cultural", 'border' => '0')),
                            '/Pages/admin',
                            array('escape' => false)
                        );
                    ?>
                </div>
                <div class="col-xs-2">
                    <h2>El Cultural <small>American School</small></h2>
                </div>
                <div class="col-xs-7"></div>
            </div>
            <div class="row data-nav">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="<?php echo $this->request->params['controller'] == 'Pages' ? 'active' : ''; ?>"><?php echo $this->Html->link("Home", array("controller" => "Pages", "action" => "admin")); ?></li>
                    <li class="dropdown 
                        <?php echo $this->request->params['controller'] == 'Alumnos' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Docentes' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Articulos' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Grados' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Secciones' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Cursos' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Aulas' ? 'active' : ''; ?>
                        <?php echo $this->request->params['controller'] == 'Users' ? 'active' : ''; ?>
                    ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Mantenimiento <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo $this->Html->link("Alumnos", array("controller" => "Alumnos", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Docentes", array("controller" => "Docentes", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Artículos", array("controller" => "Articulos", "action" => "index")); ?></li>
                            <li role="presentation" class="divider"></li>
                            <li><?php echo $this->Html->link("Grados", array("controller" => "Grados", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Secciones", array("controller" => "Secciones", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Cursos", array("controller" => "Cursos", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Aulas", array("controller" => "Aulas", "action" => "index")); ?></li>
                            <li role="presentation" class="divider"></li>
                            <li><?php echo $this->Html->link("Usuarios", array("controller" => "Users", "action" => "index")); ?></li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->request->params['controller'] == 'Periodos' ? 'active' : ''; ?>"><?php echo $this->Html->link("Registrar Periodo", array("controller" => "Periodos", "action" => "index")); ?></li>
                    <li class="<?php echo $this->request->params['controller'] == 'Horarios' ? 'active' : ''; ?>"><?php echo $this->Html->link("Registrar Horario", array("controller" => "Horarios", "action" => "index")); ?></li>
                    <li class="<?php echo $this->request->params['controller'] == 'Matriculas' ? 'active' : ''; ?>"><?php echo $this->Html->link("Registrar Matrícula", array("controller" => "Matriculas", "action" => "index")); ?></li>
                    <li class="<?php echo $this->request->params['controller'] == 'Asistencias' ? 'active' : ''; ?>"><?php echo $this->Html->link("Reporte Asistencias", array("controller" => "Asistencias", "action" => "reporte")); ?></li>
                    <li class="<?php echo $this->request->params['controller'] == 'Notas' ? 'active' : ''; ?>"><?php echo $this->Html->link("Reporte Notas", array("controller" => "Notas", "action" => "reporte")); ?></li>
                    <li style="left: 20%;">
                        <?php echo $this->Html->link(
                            $this->Html->image("cerrar-sesion.png", array("alt" => "Cerrar Sesión", "border" => "0")),
                            "/",
                            array("escape" => false)
                        );
                        ?>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <?php echo $this->html->getCrumbList(
                            array(
                                'class' => 'breadcrumb',
                                "firstClass" => false,
                                "lastClass" => "active"
                            ),
                            array('text' => 'Home')
                            );
                    ?>
                    <div id="content">
                
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">Novedades</div>
                        <?php echo $this->element("novedades"); ?>
                    </div>
                </div>
            </div>
            <div class="footer-content">Copyright 2014 - El Cultural American School - Todos los derechos reservados</div>
        </div>

        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
            
            echo $this->Html->script("default");
        ?>
      
        <?php echo $this->fetch('script'); ?>
	<!-- Js writeBuffer -->
	<?php
            if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
            // Writes cached scripts
	?>
    </body>
</html>