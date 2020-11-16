<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login de Usuarios</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">
    <div class="container w-25">
        <form>
            <label for="inputUsuario">Usuario</label>
            <input type="text" id="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <a href="<?= $urlCreateUser ?>">Registro de usuario</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
</body>
</html>