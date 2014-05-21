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
            <?php } ?>
            
            <!-- Cadre Principal -->
            <div id="main-content">
                <div id="content-table" class="table-div">
                    <div id="content-tr" class="tr-div">