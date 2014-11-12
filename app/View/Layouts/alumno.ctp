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
                            '/Pages/alumno',
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
                <?php echo $this->element("datosAlumno"); ?>
                <div class="col-xs-1"></div>
                <div class="col-xs-2">
                    <?php echo $this->Html->link(
                            $this->Html->image("cerrar-sesion.png", array("alt" => "Cerrar Sesión", "border" => "0")),
                            "/",
                            array("escape" => false)
                        );
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10">
                    <ul class="nav nav-pills">
                        <li class="<?php echo $this->request->params['controller'] == 'Asistencias' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Asistencias",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-asistencias icon-medium"></div>
                                Asistencias
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Matriculas' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Matriculas",
                                "action" => "info"
                            )); ?>">
                                <div class="icon icon-matricula icon-medium"></div>
                                Ficha Matrícula
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Horarios' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Horarios",
                                "action" => "horarioAlumno"
                            )); ?>">
                                <div class="icon icon-horario icon-medium"></div>
                                Horario
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Recursos' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Recursos",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-cursos icon-medium"></div>
                                Cursos
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Notas' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Notas",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-notas icon-medium"></div>
                                Notas
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Mensajes' ? 'active' : ''; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Mensajes",
                                "action" => ""
                            )); ?>">
                                <div class="icon icon-mensajes icon-medium"></div>
                                Mensajes
                            </a>
                        </li>
                    </ul>
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
                <div class="col-xs-2">
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