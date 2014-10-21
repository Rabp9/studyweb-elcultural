<?php
    $docente = $this->requestAction("/Docentes/datos");
?> 
<div class="col-xs-2"><strong>Código:</strong> <?php echo $docente["Docente"]["idDocente"]; ?></div>
<div class="col-xs-4"><strong>Nombre Completo:</strong> <?php echo $docente["Docente"]["nombreCompleto"]; ?></div>