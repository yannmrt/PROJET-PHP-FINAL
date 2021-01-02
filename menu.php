<div class="col-12">
                <header class="row">
                    <!-- Top Nav -->
                    <div class="col-12 bg-dark py-2 d-md-block d-none">
                        <div class="row">
                            <div class="col-auto mr-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="tel:+123-456-7890"><i class="fa fa-phone-square mr-2"></i>+33 3 00 00 00 00</a>
                                    </li>
                                    <li>
                                        <a href="mailto:mail@ecom.com"><i class="fa fa-envelope mr-2"></i>contact@exemple.fr</a>
                                    </li>
                                </ul>
                            </div>
                            <?php 

                            if(isset($_SESSION["idUser"])) {
                                ?>

                            <div class="col-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="?logout"><i class="fas fa-door-open"></i> Déconnexion</a>
                                    </li>
                                </ul>
                            </div>

                                <?php

                            } else {
                                ?> 
                                <div class="col-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="register.php"><i class="fas fa-user-edit mr-2"></i>Créer un compte</a>
                                    </li>
                                    <li>
                                        <a href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Connexion</a>
                                    </li>
                                  </ul>
                                </div> 
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Top Nav -->

                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-auto">
                                <div class="site-logo text-center text-lg-left">
                                    <a href="index.php"><?php echo $_INFO["nom"]; ?></a>
                                </div>
                            </div>
                            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-dark" placeholder="Rechercher..." required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                                <a href="#" class="header-item">
                                    <i class="fas fa-shopping-bag mr-2"></i><span id="header-favorite">0</span>
                                </a>
                                <!--<a href="#" class="header-item">
                                    <i class="fas fa-user"></i><span id="header-qty" class="mr-3"> Mon compte</span>
                                </a>-->
                            </div>
                        </div>

                        <!-- Nav -->
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Accueil</a>
                                        </li>
                                        <?php echo headerCategory($sql); ?>
                                        <?php if(isset($_SESSION['idUser'])) {
                                            ?>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="books" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                                            <div class="dropdown-menu" aria-labelledby="books">
                                                <a class="dropdown-item" href="setting.php">Paramètre de mon compte</a>
                                                <a class="dropdown-item" href="deliveryAdress.php">Adresses de livraison</a>
                                            </div>
                                        </li>

                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Nav -->

                    </div>
                    <!-- Header -->

                </header>
            </div>