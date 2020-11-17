<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h3>Creación de Usuario</h3>
        <hr>
        <?php if ($errors != "") { ?>
        <div class="alert alert-danger" role="alert">
            <?= $errors ?>
        </div>
        <?php } ?>
        <form method="POST" action="<?= $urlSaveUser ?>">
            <div class="form-group">
                <label for="inputEmail">Dirección de email</label>
                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="inputNombre">Nombre de Usuario</label>
                <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="inputPassword2">Repetir Contraseña</label>
                <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Repetir Contraseña">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </div>
</body>
</html>