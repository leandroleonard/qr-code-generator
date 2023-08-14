<?php 
    require_once 'vendor/autoload.php';

    use src\Generator;
    use src\Image;

    $url = 'http://mix-project-portfolio.epizy.com/';

    $qr_code = new Generator($url);
    $image = $qr_code->get_image();

    echo "<img src='" . $image . "'>";

    echo "<a href='download.php?image=" . $image . "'> Download image</a>";

    // $image2 = new Image($image);

    // $image2->save();
    