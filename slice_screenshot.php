<?php
$srcPath = "C:/Users/Rohan/.gemini/antigravity-ide/brain/1262046e-b93f-4c61-b534-b281f0902fc9/.user_uploaded/media_1790654201521.png";
$im = imagecreatefrompng($srcPath);
if (!$im) {
    die("Failed to open image\n");
}
$w = imagesx($im);
$h = imagesy($im);
echo "Image loaded: {$w}x{$h}\n";

$outDir = "c:/xampp/htdocs/wellnox/slices";
if (!is_dir($outDir)) {
    mkdir($outDir, 0777, true);
}

// Slice into sections based on the visual layout
$sections = [
    '01_navbar_hero' => [0, 195],
    '02_categories' => [195, 310],
    '03_company_profile' => [310, 460],
    '04_why_wellnox_and_features' => [460, 600],
    '05_popular_designs' => [600, 705],
    '06_available_finishes' => [705, 790],
    '07_catalogue_cta' => [790, 895],
    '08_footer' => [895, 1024]
];

foreach ($sections as $name => $range) {
    $y1 = $range[0];
    $y2 = $range[1];
    $sh = $y2 - $y1;
    $slice = imagecreatetruecolor($w, $sh);
    imagecopy($slice, $im, 0, 0, 0, $y1, $w, $sh);
    imagepng($slice, "{$outDir}/{$name}.png");
    imagedestroy($slice);
    echo "Saved {$name}.png ({$w}x{$sh})\n";
}
echo "Done\n";
