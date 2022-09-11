<?php
session_start();
if ($_SESSION['controlU']!=1) {
    header('location: ../');
}
?>

<header class="header">
    <div class="header_superior">
        <div class="logo">
            <img src="../imagenes/logo_usuario.png" alt="">
            <h4><?php echo $_SESSION['rol'].'/'.$_SESSION['nombreUsuario']?></h4>
            
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
            <?php include 'nav_us.php'; ?>
        </div>

    </div>

    <h1>Vista Usuario <?php echo $_SESSION['rol'];?></h1>


</header>