<?php
session_start();
setlocale(LC_TIME, "fr_FR.utf8");
$url = "http://feeds.feedburner.com/SoFoot_News"; /* flux rss a changer si besoin */
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {
    $datetime = date_timestamp_get(date_create($item->pubDate));
    $date = strftime('%d %B %Y, %Hh%I', $datetime);
}
?>
<?php require '../public/header.php' ?>
<body class="<?= isset($_SESSION['infosAdmin']) ? 'bg-admin' : 'equipe-compo' ?>">
<?php require '../public/navbar.php' ?>
<div class="text-center">
 <p class="text-white rounded col-7 mx-auto m-5 h1 bg-dark">Toute l'actualité du football en direct</p>
 
</div>
<!-- test -->
<div class="container-fluid actu-card-size">
            <div class="row justify-content-center">
                <?php
                foreach ($rss->channel->item as $item) {
                    $datetime = date_timestamp_get(date_create($item->pubDate));
                    $date = strftime('%d %B %Y à %Hh%I', $datetime);
                    $description = explode('<', $item->description);
                    ?>
                    <div class="card col-sm-8 col-lg-2 col-md-2 m-2 main-bg-color wow fadeInUp rounded">
                        <div class="row justify-content-center">
                        <a href="<?= $item->link ?>">
                                <img src="<?= (string) $item->enclosure['url'][0] ?>" class="img-fluid p-1 main-bg-color actu-img-hover rounded" alt="Photo flux Sofoot">
                                </a>
                            <div class=" col-12 col-lg-8">
                                <div class="card-block float-left">
                                    <h1 class="card-title h6"><?= $item->title ?></h1>
                                    <p class="card-text"><?= $description[0] ?></p>
                                    <small class="card-text"><?= $date ?></small>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require '../public/footer.php' ?>
        <?php require '../public/cdn.php' ?>
</body>

</html>