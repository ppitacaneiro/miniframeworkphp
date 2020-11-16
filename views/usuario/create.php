<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de Usuarios</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Creación de Usuario</h3>
        <hr>
        <form method="POST" action="<?= $urlSaveUser ?>">
            <div class="form-group">
                <label for="inputEmail">Dirección de email</label>
                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="inputNombre">Nombre de Usuario</label>
                <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Nombre de usuario" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label for="inputPassword2">Repetir Contraseña</label>
                <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Repetir Contraseña" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </div>
</body>
</html>