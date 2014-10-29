<!-- file path View/Asistencias/get_carpetas_docente.ctp -->

<?php
    echo $this->Html->script("tree");
    echo $this->Html->css("tree");
?>

<?php
    echo $this->Form->button("Subir Recurso", array(
        "type" => "button",
        "class" => "btn btn-primary",
        "data-toggle" => "modal",
        "data-target" => "#mdlSubirRecurso"
    ))
?>

<?php
    echo $this->Form->button("Crear Carpeta", array(
        "type" => "button",
        "class" => "btn btn-default",
        "data-toggle" => "modal",
        "data-target" => "#mdlCrearCarpeta"
    ))
?>

<div class="tree well">
    <ul>
<?php
    foreach ($carpetas as $carpeta) {
?>
        <li>
            <span class="glyphicon glyphicon glyphicon-folder-close"></span> 
            <a href="#"><?php 
                echo $carpeta["Carpeta"]["descripcion"]; 
                if($carpeta["Carpeta"]["tipo"] == "escritura")
                    echo " <i>(Permite Escritura)</i>";
            ?></a>
            <ul>
            <?php foreach ($carpeta["Recurso"] as $records) { ?>
                <li>
                    <span class="glyphicon glyphicon glyphicon-file"></span> 
                    <a href="#"><?php echo $records["descripcion"]; ?></a>
                </li>
            <?php } ?>
            </ul>
        </li>
<?php
    }
?>
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlSubirRecurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo $this->Form->create("Recurso", array(
                    "type" => "file",
                    "url" => array("controller" => "Recursos", "action" => "index")
                ));
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Subir Recurso</h4>
            </div>
            <div class="modal-body" id="dvCursos">
            <?php
                echo $this->Form->input("Recurso.idCarpeta", array(
                    "label" => "Carpeta",
                    "div" => "formField",
                    "autofocus" => "autofocus",
                    "options" => $listaCarpetas
                ));
                echo $this->Form->input("Recurso.descripcion", array(
                    "label" => "Descripción",
                    "div" => "formField"
                ));
                echo $this->Form->input("Recurso.ubicacion", array(
                    "label" => "Archivo",
                    "div" => "formField",
                    "type" => "file"
                ));
            ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            <?php
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlCrearCarpeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Crear Carpeta</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>