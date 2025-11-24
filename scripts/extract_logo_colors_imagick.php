<?php
$imagePath = __DIR__ . '/../app/Views/templates/images/wheels-logo.png';
if (!file_exists($imagePath)) { fwrite(STDERR, "Image not found\n"); exit(2); }
if (!class_exists('Imagick')) { fwrite(STDERR, "Imagick not available\n"); exit(3); }
$im = new Imagick($imagePath);
$im->quantizeImage(8, Imagick::COLORSPACE_RGB, 0, false, false); // reduce to 8 colors
$hist = $im->getImageHistogram();
$counts = [];
foreach ($hist as $pixel) {
    $c = $pixel->getColor();
    $r = intval(round($c['r']));
    $g = intval(round($c['g']));
    $b = intval(round($c['b']));
    $hex = sprintf('%02x%02x%02x', $r, $g, $b);
    $counts[$hex] = $pixel->getColorCount();
}
arsort($counts);
$out = array_keys(array_slice($counts,0,6,true));
echo json_encode($out) . PHP_EOL;
?>