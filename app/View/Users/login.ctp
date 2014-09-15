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
        <?php echo $this->Session->flash(); ?>

        <div class="container">
            <?php echo $this->Session->flash('auth'); ?>
            <form class="form-signin" role="form">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
                <input type="password" class="form-control" placeholder="Password" required="">
                <label class="checkbox">
                <input type="checkbox" value="remember-me">
                   Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>
        
    </body>
</html>