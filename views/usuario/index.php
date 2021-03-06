<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="text-center">
    <div class="container w-25">
        <?php
        if (isset($message) && !empty($message))
        {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $message; ?>
            </div>
        <?php
        }
        if (isset($errors) && !empty($errors))
        {
        ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                <?php 
                    foreach ($errors as $error) 
                    {
                        echo '<li>' . $error . '</li>';
                    }
                ?>
                </ul>
            </div>
        <?php
        }
        ?>
        <form method="POST" action="<?= $urlLoginUser ?>">
            <label for="inputUsuario">Usuario</label>
            <input type="text" id="inputUsuario" name="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <div><a href="<?= $urlCreateUser ?>">Registro de usuario</a></div>
                    <div><a href="#">¿Olvidaste tu contraseña?</a></div>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
</body>
</html>