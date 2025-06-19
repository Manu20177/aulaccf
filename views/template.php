<?php
// ⚠️ No debe haber NADA antes de esta línea, ni espacios ni líneas vacías
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$actionsRequired = false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./views/inc/links.php"; ?>
</head>
<body>
    <?php 
        $getViews = new viewsController();
        $response = $getViews->get_views_controller();

        if ($response == "login"):
            require_once "./views/contents/login-view.php";
        else:
            require_once "./controllers/loginController.php";

            /*---------- Check Access ----------*/
            $sc = new loginController();

            // Validar sesión antes de usar $_SESSION
            if (!isset($_SESSION['userToken'], $_SESSION['userName'])) {
                $sc->login_session_destroy_controller();
            }

            echo $sc->check_access($_SESSION['userToken'], $_SESSION['userName']);

            /*---------- Login Out ----------*/
            if (isset($_POST['token'])) {
                $logout = new loginController();
                $logout->login_session_destroy_controller();
            } 

            /*---------- SideBar ----------*/
            include "./views/inc/sidebar.php"; 
        ?>
        <!-- Content page -->
        <section class="full-box dashboard-contentPage">
            <?php
                /*---------- NavBar ----------*/
                include "./views/inc/navbar.php";
            
                /*---------- Include Contents ----------*/
                require_once $response;
            ?>
        </section>
    <?php endif; ?>

    <!--====== Scripts -->
    <?php include "./views/inc/scripts.php"; ?>
</body>
</html>