<?php
require_once('Connect.php');

class Session
{
    public $password;
    public $email;


    public function StartSession($email, $password)
    {
        $conn = new Connect;
        $connect = $conn->init();
        $query = $connect->prepare("SELECT * FROM user
        WHERE email = :email AND password = :password");
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        print_r($usuario);

        session_start();
        if ($usuario) {
            //Creamos Sesion
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['name'] = $usuario['name'];
            header("Location: http://localhost/clases_php/EvidenciaLogin/inicio.php");
        } else {

            $msg = "Las credenciales ingresadas no coinciden";
            $aPathOrigin = explode('?', $_SERVER['HTTP_REFERER']);
            $pathOrigin = $aPathOrigin[0];

            header("Location: $pathOrigin?msg=$msg");
        }
    }

    public function closedtSession()
    {
        $cerrar = $_REQUEST['cerrar'] ?? '';
        if ($cerrar) {
            session_start();
            session_unset();
            session_destroy();
            header("Location: http://localhost/clases_php/EvidenciaLogin/login.php");
        }
    }
}
