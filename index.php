<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    header('location: sistema_rest/');
} else {
    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = "Ingrese su usuario y contraseña";
        } else {
            require_once "./include/conexion.php";
            $user = mysqli_real_escape_string($conn, $_POST['usuario']);
            $pass = mysqli_real_escape_string($conn, $_POST['clave']);

            $query1 = mysqli_query($conn, "SELECT * FROM usuario WHERE nick='$user' and clave='$pass'");
            $result1 = mysqli_num_rows($query1);

            $query2 = mysqli_query($conn, "SELECT * FROM administrador WHERE nick='$user' and clave='$pass'");
            $result2 = mysqli_num_rows($query2);



            if ($result1 > 0) {
                $dataU = mysqli_fetch_array($query1);

                $_SESSION['controlU'] =1;
                $_SESSION['idUsuario'] = $dataU['id_usuario'];
                $_SESSION['Nombre'] = $dataU['nombres'];
                $_SESSION['ap_paterno'] = $dataU['apPat'];
                $_SESSION['ap_materno'] = $dataU['apMat'];
                $_SESSION['nombreUsuario'] = $dataU['nick'];
                $_SESSION['clave'] = $dataU['clave'];
                $_SESSION['nacionalidad'] = $dataU['nacionalidad'];
                $_SESSION['correo'] = $dataU['email'];
                $_SESSION['rol'] = $dataU['rol'];
                $_SESSION['id_admin'] = $dataU['id_admin'];
                
                print_r($_SESSION);
                //header('Location: sistema_rest/vista_usuario.php');

                /*if ($_SESSION['rol'] == 'CLIENTE') {
                    header('Location: sistema_rest/vista_cliente.php');
                }else{
                    if ($_SESSION['rol']=='CAJERO' || $_SESSION['rol']=='MESERO' || $_SESSION['rol']=='CHEF'){
                        
                    }
                }
                */


                
            }else{
                if ($result2 > 0) {

                    $data = mysqli_fetch_array($query2);
    
                    $_SESSION['activeA'] = true;
                    $_SESSION['idAdmin'] = $data['id_admin'];
                    $_SESSION['NombreA'] = $data['nombre'];
                    $_SESSION['ap_paterno'] = $data['apPat'];
                    $_SESSION['ap_materno'] = $data['apMat'];
                    $_SESSION['nombreUAdmin'] = $data['nick'];
                    $_SESSION['clave'] = $data['clave'];
                    $_SESSION['experiencia'] = $data['an_expe'];
                    $_SESSION['salarioAd'] = $data['salario'];
                    $_SESSION['rol_admin']="ADMIN";
                    
                    print_r($_SESSION);
                    header('Location:sistema_rest/vista_admin.php');
                } else {
                    $alert = "Usuario y Clave incorrectos";
                    session_destroy();
                }
            }
            
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
    <link rel="stylesheet" href="./css/style.css">
    <title>LOGIN</title>
</head>

<body>
    <section id="container">
        <form action="index.php" method="POST">
            <h3>Login de Accesoooo</h3>
            <img src="imagenes/imagen_rest_281_1.png" alt="Login" width="150px" height="100px">
            <input type="text" name="usuario" placeholder="Nombre Usuario">
            <input type="password" name="clave" placeholder="Contraseña">

            <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?></div>
            <input type="submit" value="ACCEDER">

        </form>

    </section>



</body>

</html>