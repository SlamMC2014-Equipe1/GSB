<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
        <title>Application Laboratoire Galaxy-Swiss Bourdin</title>
    </head>
    <body>
        <div id="main">
            <!-- Header Bar -->
            <?php if ($uc != 'connexion') {?>
            <header id="header">
                <div id="menu">
                    <a id="user-header" href="#">
                        <img id="user-header-avatar" src="images/avatars/default.jpg" />
                        <div id="user-header-names">
                            <span id="user-header-names-span">
                                <?php echo $user->getPrenom() . ' ' . $user->getNom(); ?>
                            </span>
                            <img src="images/user-header-arrow.png" />
                        </div>
                    </a>
                </div>     
                <a id="logo" class="link">
                    <img src="./images/logo-gsb.png" alt="Laboratoire Galaxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin" />
                </a>
            </header>
            <div id="user-menu">
                <div id="user-menu-description">
                    <span class="rang">Rang : <?php echo $user->getRole(); ?></span>
                </div>
                <div id="user-menu-deconnexion">
                    <a href="index.php?uc=connexion&action=deconnexion" title="Déconnexion">
                        <span class="btn-deconnexion">Déconnexion</span>
                    </a>
                </div>
            </div>
            <script src="js/jquery.js"></script>
            <script>
                $(function() {
                   $('#user-header').click(function() {
                       var display = $('#user-menu').css('display');
                       if (display === 'block') {
                           $('#user-menu').css('display', 'none');
                       } else {
                           $('#user-menu').css('display', 'block');
                       }
                   });
                });
            </script>
            <?php } ?>
            
            <!-- Cadre Principal -->
            <div id="main-content">
                <div id="content-table" class="table-div">
                    <div id="content-tr" class="tr-div">