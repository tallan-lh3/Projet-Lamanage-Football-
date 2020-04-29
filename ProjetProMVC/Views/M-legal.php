<?php 
session_start(); 
require '../public/header.php' ?>

<body class="bg-white">
        <?php require '../public/navbar.php' ?>
        <div class="text-center">
                <p class="text-dark rounded-pill col-8 mx-auto m-5 h1 ">Mentions légales</p>
        </div>
        <div class="text-dark col-8 mx-auto">
                <p>
                        <p>Le présent site est exploité par la société par actions simplifiée <strong>LAMANAGE</strong>.
                        </p>
                        <ul>
                                <li>Capital :</li>
                                <li>N° d’inscription au RCS de Paris :</li>
                                <li>N° de SIRET : </li>
                                <li>N° TVA intra-communautaire : </li>
                                <li>Code APE :</li>
                                <li>Adresse du siège social : </li>
                                <li>N° de téléphone : </li>
                                <li>Email : </li>
                        </ul>
                        <p>Le Directeur de la publication du site web est Monsieur Allan TOUTAIN, en qualité de
                                Directeur Général.</p>
                        <ul>
                                <li>Capital : </li>
                                <li>Adresse du siège social : </li>
                                <li>N° de téléphone : </li>
                        </ul>
                </p>
        </div>
        <?php require '../public/footer.php' ?>
        <?php require '../public/cdn.php' ?>
</body>

</html>