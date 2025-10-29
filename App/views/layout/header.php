<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sonsie+One&display=swap" rel="stylesheet">

    <!-- STYLES -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/header.css">
    <link rel="stylesheet" href="assets/styles/footer.css">
    <link rel="stylesheet" href="assets/styles/errorBox.css">

    <title>PsicoMarket</title>
</head>

<body>
    <header>
        <div class="buttons">
            <div class="menuIcon icon">
                <div class="menuBar menuBar1"></div>
                <div class="menuBar menuBar2"></div>
                <div class="menuBar menuBar3"></div>
            </div>
        </div>
        <div class="logoTitle">
            <a href="index.php">
                <div class="logo">
                    <picture>
                        <img src="assets/images/Logo.png" alt="" class="logoImage">
                    </picture>
                </div>
                <div class="title">
                    <h1>PsicoMarket</h1>
                </div>
            </a>
        </div>
        <?php if (!empty($_SESSION['user_id'])): ?>
            <a href="index.php?controller=AccountController" title="Ir a tu perfil">
                <img src="<?= $userProfileImage['UserImagePath'] ?? 'assets/images/icons/userLogo.png' ?>" id="headerUserImage">
            </a>
        <?php else: ?>
            <a href="index.php?controller=AuthController" title="Inicia sesión">
                <img src="<?= $userProfileImage['UserImagePath'] ?? 'assets/images/icons/userLogo.png' ?>" id="headerUserImage">
            </a>
        <?php endif ?>
        <div class="buttons">
            <form method="post" class="icon">
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <button type="submit" name="logout" class="cerrarSesion">
                        <img src="assets/images/icons/Logout.svg" title="Cerrar sesión" class="logOutIcon">
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </header>
    <?php
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
    require_once "views/components/Nav/{$navFile}.html";
    ?>
    <script src="assets/scripts/headerNav.js"></script>
