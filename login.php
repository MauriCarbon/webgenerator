<?php 


    require 'db.php';
    
    if(isset($_GET['boton'])){
        $email = $_GET['email'];
        $password = $_GET['contraseña'];
        if($email=="admin@server.com" && $password=="serveradmin"){
            session_start();
            $_SESSION['idUsuario']=$email;
            echo "User and Pass right";
            header("location:panel.php?mode=admin");
        }
        $result = $db->query("SELECT * FROM usuarios WHERE email='".$email."'");
        $res = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(! $result->num_rows){
            echo "No se ha encontrado un usuario con ese email";
        }else {
            if($password==$res['password']){
                session_start();
                $_SESSION['idUsuario']=$res['idUsuario'];
                echo "User and Pass right";
                header("location:panel.php");
            }else{
                echo "La contraseña es erronea";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBGENERATOR Mauricio Carbon</title>
    <style>
        body > form {
            display:flex;
            margin-top:35vh;
            flex-direction:column;
            align-items:center;
            justify-content:space-between;
            gap:20px;
        }
    </style>
</head>
<body>
    <form action="">
        <input type="text" name="email" id="" placeholder="email" require>
        <input type="password" name="contraseña" id="" placeholder="contraseña" require>
        <a href="register.php">Registrarse</a>
        <input type="submit" value="Ingresar" name="boton">
    </form>
</body>
</html>