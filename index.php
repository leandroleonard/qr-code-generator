<?php 
    require_once 'vendor/autoload.php';

    use src\Generator;

    $url = 'http://mix-project-portfolio.epizy.com/';

    $qr_code = new Generator($url);

    echo "<img src='" . $qr_code->get_image() . "'>";
    