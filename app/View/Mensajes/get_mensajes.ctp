<!-- file path View/Mensajes/get_mensajes.ctp -->
<?php
    if(empty($mensajes)) {                       
        echo $this->element("flash_bootstrap", array(
            "message" => "No hay mensajes registrados"
        ));
    }
    else {
        echo "<div class='list-group'>";
        foreach ($mensajes as $mensaje) {
?>
            <a class="list-group-item <?php echo $mensaje["Mensaje"]["remite"] == "Alumno" ? "active" : "" ?>">
                <h4 class="list-group-item-heading"><?php echo $mensaje["Mensaje"]["asunto"]; ?></h4> 
                <small><i><?php echo $mensaje["Mensaje"]["remite"];?></i></small>
                <p class="list-group-item-text"><?php echo $mensaje["Mensaje"]["cuerpo"]; ?></p>
            </a>
<?php
        }
        echo "</div>";
    }
?>