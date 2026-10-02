<?php
$slice3 = "C:/Users/Rohan/.gemini/antigravity-ide/brain/1262046e-b93f-4c61-b534-b281f0902fc9/.tempmediaStorage/media_1790655351439.png";
if (file_exists($slice3)) {
    $im = imagecreatefrompng($slice3);
    $w = imagesx($im);
    $h = imagesy($im);
    // Factory image is on the left
    $factory = imagecreatetruecolor(173, 115);
    imagecopy($factory, $im, 0, 0, 0, 0, 173, 115);
    imagepng($factory, "c:/xampp/htdocs/wellnox/public/assets/images/company-factory.png");
    imagedestroy($factory);
    imagedestroy($im);
    echo "Refined company-factory.png\n";
}

// Slice 4 has the Why Wellnox banner
$slice4 = "C:/Users/Rohan/.gemini/antigravity-ide/brain/1262046e-b93f-4c61-b534-b281f0902fc9/.tempmediaStorage/media_1790655363924.png";
if (file_exists($slice4)) {
    $im = imagecreatefrompng($slice4);
    $banner = imagecreatetruecolor(imagesx($im), 105);
    imagecopy($banner, $im, 0, 0, 0, 8, imagesx($im), 105);
    imagepng($banner, "c:/xampp/htdocs/wellnox/public/assets/images/why-wellnox-banner.webp");
    imagedestroy($banner);
    imagedestroy($im);
    echo "Refined why-wellnox-banner.webp\n";
}

echo "Done refining\n";
