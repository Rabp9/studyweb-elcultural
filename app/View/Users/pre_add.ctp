<!-- File: /app/View/Users/pre_add.ctp -->
<?php 
    $this->html->addCrumb('Usuarios', '/Users');
    $this->html->addCrumb('Nuevo', '/Users/add');
?>

<h2>Usuarios <small>Nuevo</small></h2>

<div class="row">
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Users",
                "action" => "add"
            )); ?>">
                <?php echo $this->Html->image("iconos/Administrador.jpg"); ?>
                <div class="caption">
                    <h3 style="text-align: center;">Usuario Administrador</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Alumnos",
                "action" => "add"
            )); ?>">
                <?php echo $this->Html->image("iconos/Alumnos.png"); ?>
                <div class="caption">
                    <h3 style="text-align: center;">Usuario Alumno</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="thumbnail">
            <a href="<?php echo $this->Html->url(array(
                "controller" => "Docentes",
                "action" => "add"
            )); ?>">
                <?php echo $this->Html->image("iconos/Docentes.png"); ?>
                <div class="caption">
                    <h3 style="text-align: center;">Usuario Docente</h3>
                </div>
            </a>
        </div>
    </div>
</div>