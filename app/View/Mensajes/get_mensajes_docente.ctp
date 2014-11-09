<!-- file path View/Mensajes/get_mensajes_docente.ctp -->
<?php
    if(empty($mensajes)) {                       
        echo $this->element("flash_bootstrap", array(
            "message" => "No hay mensajes registrados"
        ));
    }
    else {
        foreach ($mensajes as $mensaje) {
?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $mensaje["Mensaje"]["asunto"]; ?></h3>
                <small><i><?php echo $mensaje["Mensaje"]["remite"];?></i></small>
            </div>
            <div class="panel-body">
                <?php echo $mensaje["Mensaje"]["cuerpo"]; ?>
            </div>
        </div>
<?php
        }
    }
?>