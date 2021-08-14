<?php
session_start();

if (!$_SESSION) {
    header("Location: http://localhost/clases_php/EvidenciaLogin/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }
</style>

<body>
    <form class="form-signin" action="start.php?cerrar=true" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Bienvenido <?php echo $_SESSION['name']; ?></h1>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Cerrar Sesion</button>
    </form>
</body>

</html>