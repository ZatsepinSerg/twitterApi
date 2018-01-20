<?php
require "TwitterMessager.php";
$twitterMessager = new TwitterMessager();
$collectTwits = $twitterMessager->viewMessage();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet"  href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet"  href="vendor/twbs/bootstrap/dist/css/bootstrap-theme.css">
    <link rel="stylesheet"  href="css/style.css">

    <script src="vendor/components/jquery/jquery.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" ><div class="col-md-12" style="height: 100px"></div>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10" id="twitts">
                    <? foreach ( $collectTwits AS $twits):?>
                        <div class="col-sm-10 twitter">
                            <div id="tb-testimonial" class="testimonial testimonial-default">
                                <div class="testimonial-section">
                                    <?= $twits[0]?>
                                </div>
                                <div class="testimonial-desc">
                                    <img src=" <?= $twits[3] ?>" alt="<?= $twits[2]?>" />
                                    <div class="testimonial-writer">
                                        <div class="testimonial-writer-name"><?= $twits[2]?></div>
                                        <div class="testimonial-writer-name">Date by: <?= $twits[1]?></div>
                                        <div class="testimonial-writer-designation"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/realTime.js"></script>
</body>
</html>
