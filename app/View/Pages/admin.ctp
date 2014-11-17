<!-- File: /app/View/Pages/admin.ctp -->
<?php 
    $this->assign("title", "Bienvenido Administrador");
?>
<h2>Bienvenido Administrador</h2>

<style>
    div.thumbnail h3 {
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Alumnos",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Alumnos.png"); ?>
                <div class="caption">
                    <h3>Mantenimiento Alumnos</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Docentes",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Docentes.png"); ?>
                <div class="caption">
                    <h3>Mantenimiento Docentes</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Articulos",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Articulos.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Artículos</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Grados",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Grados.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Grados</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Secciones",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Secciones.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Secciones</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Cursos",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Cursos.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Cursos</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Aulas",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Aulas.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Aulas</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Users",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Usuarios.jpg"); ?>
                <div class="caption">
                    <h3>Mantenimiento Usuarios</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Periodos",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Periodos.jpg"); ?>
                <div class="caption">
                    <h3>Registrar Periodo</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Horarios",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Horarios.jpg"); ?>
                <div class="caption">
                    <h3>Registrar Horario</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Matriculas",
                "action" => "index"
            )); ?>">
                <?php echo $this->Html->image("iconos/Matriculas.jpg"); ?>
                <div class="caption">
                    <h3>Registrar Matricula</h3>
                </div>
            </a>
        </div>
    </div>  
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Asistencias",
                "action" => "reporte"
            )); ?>">
                <?php echo $this->Html->image("iconos/Asistencias-reporte.png"); ?>
                <div class="caption">
                    <h3>Reporte Asistencias</h3>
                </div>
            </a>
        </div>
    </div>    
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Notas",
                "action" => "reporte"
            )); ?>">
                <?php echo $this->Html->image("iconos/Notas-reporte.jpg"); ?>
                <div class="caption">
                    <h3>Reporte Notas</h3>
                </div>
            </a>
        </div>
    </div>
</div>