<!-- File: /app/View/Users/login.ctp -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantilla - Por Defecto</title>    
        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
            echo $this->Html->css('login');
        ?>
    </head>
    <body>

        <div class="container">
            <?php echo $this->Form->create('User', array(
                "class" => "form-signin",
                "role" => "form"
            )); ?>
            <div class="panel-success page-header" style="text-align: center;">
            <?php
                echo $this->Html->image('elcultural.logo.png', array('alt' => "El Cultural", 'border' => '0'));
            ?>
                <h2>El Cultural<br> <small>American School</small></h2>
            </div>
            <?php echo $this->Session->flash(); ?>
            <h2 class="form-signin-heading">Ingresar</h2>
            <?php 
                echo $this->Form->input('username', array(
                    "label" => false,
                    "class" => "form-control",
                    "placeholder" => "Nombre de Usuario",
                    "autofocus" => "autofocus"
                ));
                echo $this->Form->input('password', array(
                    "label" => false,
                    "class" => "form-control",
                    "placeholder" => "Password"
                ));
            ?>
            <label class="checkbox">
                <input type="checkbox" value="remember-me">
                Recuérdame
            </label>
            <?php
                echo $this->Form->button("Log in", array(
                    "class" => "btn btn-lg btn-primary btn-block"
                ));
                echo $this->Form->end();
            ?>
        </div>
        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>
    </body>
</html>