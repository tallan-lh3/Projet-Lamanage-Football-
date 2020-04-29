<!-- Footer -->
<footer class="page-footer font-small bg-light rounded text-dark mt-5">

    <!-- Footer Links -->
    <div class="container text-center">

        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-6 mx-auto">
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Plan du site</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="text-dark" href="equipe_actu.php"><i class="fas fa-link"></i> Actualités</a>
                    </li>
                    <li>
                        <a class="text-dark" href="equipe_stats.php"><i class="fas fa-link"></i> Statistiques</a>
                    </li>
                    <?php
if (isset($_SESSION['infosAdmin'])) {?>
                    <!-- vue admin -->
                    <li>
                        <a class="text-dark" href="equipe_compo.php"><i class="fas fa-link"></i> Mon équipe</a>
                    </li>
                    <?php
} else {?>
                    <li>
                        <a class="text-dark" href="compo-for-player.php"><i class="fas fa-link"></i> Mon équipe</a>
                    </li>

                    <?php }
?>
                    <li>
                        <a class="text-dark nav-trainingResult" href=""><i class="fas fa-tools"></i>
                            <del>Résultats</del></a>
                    </li>
                    <li>
                        <a class="text-dark nav-trainingResult" href=""><i class="fas fa-tools"></i>
                            <del>Entrainement</del> </a>
                    </li>

                </ul>

            </div>

            <!-- Grid column -->
            <div class="col-6 mx-auto">
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contact</h5>

                <ul class="list-unstyled">
                    <li>
                        <a class="text-dark" href="https://gmail.com" target="_blank"><i class="far fa-envelope"></i>
                            lamanage-contact@lamanage.com</a>

                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i> 2 rue Lamanage, 76600, Le Havre, France.
                    </li>
                </ul>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <div>
            <a href=""><i class="fab fa-facebook fa-2x"></i></a>
            <a href=""><i class="fab fa-twitter-square fa-2x"></i></a>
            <a href=""><i class="fab fa-instagram fa-2x"></i></a>
            <a href=""><i class="fab fa-linkedin fa-2x"></i></a>
        </div>
        © 2020 Copyright:
        <a href=""> Lamanage.com</a> <br>
        <a href="M-legal.php">Mentions légales</a>
        <a href="terms-of-use">CGU</a>
    </div>

    <!-- Copyright -->

</footer>
<!-- Footer -->