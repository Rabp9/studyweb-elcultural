<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantilla</title>

        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
            echo $this->Html->css('studyweb');
        ?>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
         
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