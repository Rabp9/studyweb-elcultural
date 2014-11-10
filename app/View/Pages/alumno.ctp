<h2>Bienvenido Alumno</h2>

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
                "action" => "index"
            )); ?>">
                <div class="icon icon-asistencias icon-medium"></div>
                <div class="caption">
                    <h3>Asistencias</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Matriculas",
                "action" => "info"
            )); ?>">
                <div class="icon icon-matricula icon-medium"></div>
                <div class="caption">
                    <h3>Ficha Matricula</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Horarios",
                "action" => "horarioAlumno"
            )); ?>">
                <div class="icon icon-horario icon-medium"></div>
                <div class="caption">
                    <h3>Horarios</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Recursos",
                "action" => "index"
            )); ?>">
                <div class="icon icon-cursos icon-medium"></div>
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
                "action" => "index"
            )); ?>">
                <div class="icon icon-notas icon-medium"></div>
                <div class="caption">
                    <h3>Notas</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Mensajes",
                "action" => ""
            )); ?>">
                <div class="icon icon-mensajes icon-medium"></div>
                <div class="caption">
                    <h3>Mensajes</h3>
                </div>
            </a>
        </div>
    </div>
</div>