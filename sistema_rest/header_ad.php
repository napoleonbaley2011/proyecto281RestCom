<?php
session_start();
if (empty($_SESSION['activeA'])) {
    header('location: ../');
}
?>

<header class="header">
    <div class="header_superior">
        <div class="logo">
            <img src="../imagenes/logo_usuario.png" alt="">
            <h4><?php echo $_SESSION['NombreA'].'/'.$_SESSION['rol_admin']?></h4>
            
        </div>
        <div class="search">
            <input type="search" placeholder="Busqueda" class="">
        </div>

        <div class="salir">
            <a href="../include/salir.php"><img src="../imagenes/logo_salir.png" alt="Salir" width="40px" height="40px"></a>
        </div>
    </div>
    <div class="container_menu">
        <div class="menu">
            <?php include 'nav_ad.php'; ?>
        </div>

    </div>

    <h1>Vista Administrador</h1>
    <h2><?php  echo $_SESSION['activeA']; print_r($_SESSION)?></h2>


</header>