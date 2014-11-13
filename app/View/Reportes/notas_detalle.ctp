<!-- file path View/Reportes/notas_detalle.ctp -->

<?php  
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-list-alt")) . " Exportar a PDF", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>