<!-- File: /app/View/Pages/docente.ctp -->
<?php 
    $this->assign("title", "Bienvenido Docente");
?>

<h2>Bienvenido Docente</h2>

<style>
    div.thumbnail h3 {
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Asistencias",
                "action" => "registrar"
            )); ?>">
                <div class="icon icon-asistencias icon-medium"></div>
                <div class="caption">
                    <h3>Registrar Asistencia</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Recursos",
                "action" => "registrar"
            )); ?>">
                <div class="icon icon-matricula icon-medium"></div>
                <div class="caption">
                    <h3>Cursos</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Notas",
                "action" => "registrar"
            )); ?>">
                <div class="icon icon-horario icon-medium"></div>
                <div class="caption">
                    <h3>Registrar Nota</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Mensajes",
                "action" => "mensajesDocente"
            )); ?>">
                <div class="icon icon-cursos icon-medium"></div>
                <div class="caption">
                    <h3>Mensajes</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Reportes",
                "action" => "estadisticas"
            )); ?>">
                <div class="icon icon-notas icon-medium"></div>
                <div class="caption">
                    <h3>Reporte Estadísticas Cursos</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Reportes",
                "action" => "notas"
            )); ?>">
                <div class="icon icon-mensajes icon-medium"></div>
                <div class="caption">
                    <h3>Reporte Notas</h3>
                </div>
            </a>
        </div>
    </div>
</div>