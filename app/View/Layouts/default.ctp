<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantilla - Por Defecto</title>        <!-- Bootstrap -->
        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
        ?>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
        
        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>
        
    </body>
</html>