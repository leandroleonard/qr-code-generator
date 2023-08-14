<?php
require_once 'vendor/autoload.php';

use src\Image;

if(isset($_GET['image'])) {

    $image = new Image($_GET['image']);

    $image->save()  or die("Error: Something went wrong");
    $imagePath =  $image->getFullPath();


    if(file_exists($imagePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        exit;
    } else {
        echo "Image not found.";
    }
    
} else {
    echo " Cannot identify the 'image'.";
}
?>
