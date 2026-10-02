<?php
// Script to extract all individual assets from the reference design
// The reference image is 333 x 1024
$srcPath = "C:/Users/Rohan/.gemini/antigravity-ide/brain/1262046e-b93f-4c61-b534-b281f0902fc9/.user_uploaded/media_1790654201521.png";
$src = imagecreatefrompng($srcPath);
if (!$src) {
    die("Cannot open reference image\n");
}

$imgDir = "c:/xampp/htdocs/wellnox/public/assets/images";
$prodDir = "c:/xampp/htdocs/wellnox/public/assets/products";

function cropAndSave($src, $x, $y, $w, $h, $destPath, $scale = 2) {
    $crop = imagecreatetruecolor($w * $scale, $h * $scale);
    imagealphablending($crop, false);
    imagesavealpha($crop, true);
    
    // High quality resample
    imagecopyresampled($crop, $src, 0, 0, $x, $y, $w * $scale, $h * $scale, $w, $h);
    
    $dir = dirname($destPath);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    
    imagepng($crop, $destPath, 9);
    imagedestroy($crop);
    echo "Saved $destPath ({$w}x{$h} scaled {$scale}x)\n";
}

// 1. Hero background & main hero image
cropAndSave($src, 0, 0, 333, 195, "$imgDir/hero-bg.png", 3);
cropAndSave($src, 280, 150, 40, 40, "$imgDir/badge-20-years.png", 3);

// 2. Category Cards
// Row 1 categories in reference (y ~ 222 to 300, 4 cards)
// Card width ~ 70px, gap ~ 6px, x starts ~ 14
cropAndSave($src, 14, 222, 72, 85, "$prodDir/cat-drain-system.png", 3);
cropAndSave($src, 92, 222, 72, 85, "$prodDir/cat-shower-channel.png", 3);
cropAndSave($src, 169, 222, 72, 85, "$prodDir/cat-bathroom-acc.png", 3);
cropAndSave($src, 246, 222, 72, 85, "$prodDir/cat-health-faucets.png", 3);

// 3. Company Profile factory image (left side)
cropAndSave($src, 0, 317, 172, 108, "$imgDir/company-factory.png", 3);

// 4. Why Wellnox banner background image
cropAndSave($src, 0, 467, 333, 115, "$imgDir/why-wellnox-banner.webp", 3);

// 5. Featured Popular Designs
// 4 cards across (y ~ 632 to 675)
cropAndSave($src, 14, 631, 72, 45, "$prodDir/pop-square-drainer.png", 3);
cropAndSave($src, 92, 631, 72, 45, "$prodDir/pop-channel-drainer.png", 3);
cropAndSave($src, 169, 631, 72, 45, "$prodDir/pop-round-drainer.png", 3);
cropAndSave($src, 246, 631, 72, 45, "$prodDir/pop-wave-channel.png", 3);

// 6. Available Finishes
// 5 finishes (y ~ 730 to 770)
cropAndSave($src, 14, 730, 56, 42, "$prodDir/finish-matt.png", 3);
cropAndSave($src, 75, 730, 56, 42, "$prodDir/finish-glossy.png", 3);
cropAndSave($src, 137, 730, 56, 42, "$prodDir/finish-gold.png", 3);
cropAndSave($src, 199, 730, 56, 42, "$prodDir/finish-rosegold.png", 3);
cropAndSave($src, 261, 730, 56, 42, "$prodDir/finish-black.png", 3);

// 7. Catalogue CTA Section
cropAndSave($src, 0, 792, 333, 98, "$imgDir/catalogue-cta-bg.png", 3);
cropAndSave($src, 10, 794, 130, 95, "$imgDir/catalogue-book.png", 3);

echo "All assets extracted successfully!\n";
