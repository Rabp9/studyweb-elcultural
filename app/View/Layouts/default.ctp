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
            echo $this->Html->css('login');
        ?>
    </head>
    <body>
        <div class="container">
            <form class="form-login" role="form">
                <?php
                ?>
                <input type="email" placeholder="Email" required="" autofocus="">
                <input type="password" placeholder="Password" required="">
                <label class="checkbox">
                    <input type="checkbox" value="recordarme">
                    Recordarme
                </label>
                <button class="btn btn-lg btn-default btn-block" type="submit">Log in</button>
            </form>
        </div>
        <?php
                debug($this->foo);
        ?>
    </body>
</html>